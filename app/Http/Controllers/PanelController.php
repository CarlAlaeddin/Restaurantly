<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;

class PanelController
{

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $events = Event::query()->orderBy('id','desc')->where('status','LIKE',1)->paginate(10);
        return view('Panel.index',compact(['events']));
    }


    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function event(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Panel.pages.event.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeEvent(StoreEventRequest $request): RedirectResponse
    {
        $image = time() . '-event' . '.' . $request->file('image')->getClientOriginalExtension();

        $event = new Event([
            'user_id'    =>     auth()->user()->id,
            'image'      =>     $image,
            'title'      =>     $request->get('title'),
            'price'      =>     $request->get('price'),
            'body'       =>     $request->get('body'),
            'status'     =>      0
        ]);

        $event->save();
        $user = auth()->user();
        Notification::send($user, new \App\Notifications\Event($event));
        $request->image->move('images/event', $image);
        return redirect()->route('panel.index')->with('success', 'Your event has been successfully created');
    }

}
