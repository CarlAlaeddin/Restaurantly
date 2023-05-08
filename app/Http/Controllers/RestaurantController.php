<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Event;
use App\Models\Menu;
use App\Models\Special;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cache;

class RestaurantController extends Controller
{
    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        // time for cache =>  sec 3600 = 1 hour
        $ttl = 3600;

        $chooses = Cache::remember('choose', $ttl, function () {
            return Choose::query()
                ->orderBy('id', 'asc')
                ->where('status', 'LIKE', 1)
                ->get();
        });

        $menus = Cache::remember('menu', $ttl, function () {
            return Menu::query()
                ->orderBy('id', 'desc')
                ->where('status', 'LIKE', 1)
                ->get();
        });

        $tags = Cache::remember('tag', $ttl, function () {
            return Tag::query()
                ->orderBy('id', 'desc')
                ->where('status', 'LIKE', 1)
                ->get();
        });

        $specials = Cache::remember('special', $ttl, function () {
            return Special::query()
                ->orderBy('id', 'desc')
                ->where('status', 'LIKE', 1)
                ->get();
        });

        $events = Cache::remember('gallery', $ttl, function () {
            return Event::query()
                ->orderBy('created_at', 'desc')
                ->where(
                    'status',
                    'LIKE',
                    1
                )->get();
        });

        return view(
            'Restaurant.index',
            compact([
                'chooses',
                'menus',
                'tags',
                'specials',
                'events'
            ])
        );
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function inner(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('/Restaurant.inner-page');
    }
}
