<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $events = Event::query()->orderBy('id','desc')->paginate(10);
        return view('Admin.pages.event.index',compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request): RedirectResponse
    {
        $image = time() . '-event' . '.' . $request->file('image')->getClientOriginalExtension();

        $event = new Event([
            'user_id'    =>     auth()->user()->id,
            'image'      =>     $image,
            'title'      =>     $request->get('title'),
            'price'      =>     $request->get('price'),
            'body'       =>     $request->get('body'),
            'status'     =>     $request->get('status'),
        ]);

        $event->save();
        $request->image->move('images/event', $image);
        return redirect()->route('event.index')->with('success', 'Your event has been successfully created');
    }

    /**
     * Display the specified resource.
     * @param Event $event
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Event $event): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.event.show',compact(['event']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Event $event
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Event $event): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.event.edit',compact(['event']));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateEventRequest $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        if (!is_null($request->file('image'))) {
            if (is_dir('/images/event'.$event->image))
            {
                unlink('images/event/'.$event->image);
            }
            $image = time() . '-event' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/event', $image);
            $event->image = $image;
        }

        $event->title       = $request->get('title');
        $event->slug        = null;
        $event->price       = $request->get('price');
        $event->body        = $request->get('body');
        $event->status      = $request->get('status');

        $event->update();
        return redirect()->route('event.index')->with('success', 'Your event has been successfully edited');


    }

    /**
     * Remove the specified resource from storage.
     * @param Event $event
     * @return RedirectResponse
     */
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Your event has been successfully deleted');
    }
}
