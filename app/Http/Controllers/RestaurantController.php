<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $chooses = Choose::query()->orderBy('id','asc')->where('status','LIKE',1)->get();
        return view('/Restaurant.index',compact(['chooses']));
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function inner(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('/Restaurant.inner-page');
    }
}
