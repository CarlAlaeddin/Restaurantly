<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class RestaurantController extends Controller
{
    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $chooses = Choose::query()
            ->orderBy('id', 'asc')
            ->where('status', 'LIKE', 1)
            ->get();

        $menus = Menu::query()
            ->orderBy('id', 'desc')
            ->where('status', 'LIKE', 1)
            ->get();
        $tags = Tag::query()->orderBy('id','desc')->where('status','LIKE',1)->get();

        return view('Restaurant.index', compact(['chooses', 'menus', 'tags']));
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function inner(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('/Restaurant.inner-page');
    }
}
