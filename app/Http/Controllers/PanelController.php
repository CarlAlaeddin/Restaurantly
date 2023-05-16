<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

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

}
