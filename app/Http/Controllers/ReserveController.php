<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReserveRequest;
use App\Models\Reserve;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $reserves = Reserve::query()->orderBy('id','desc')->get();
        return view('Admin.pages.reserve.index',compact(['reserves']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.reserve.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreReserveRequest $request
     * @return RedirectResponse
     */
    public function store(StoreReserveRequest $request): RedirectResponse
    {
        $reserve = new Reserve([
            'user_id'     =>        auth()->user()->id,
            'slug'        =>        null,
            'name'        =>        $request->get('name'),
            'email'       =>        $request->get('email'),
            'phone'       =>        $request->get('phone'),
            'date'        =>        $request->get('date'),
            'time'        =>        $request->get('time'),
            'people'      =>        $request->get('people'),
            'message'     =>        $request->get('message'),
        ]);

        $reserve->save();
        return redirect()->back()->with('success', 'A table has been reserved for you');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Reserve $reserve
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Reserve $reserve): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('Admin.pages.reserve.edit', compact('reserve'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Reserve $reserve
     * @return RedirectResponse
     */
    public function update(Request $request, Reserve $reserve): RedirectResponse
    {
            $request->slug        =        null;
            $request->name        =        $request->get('name');
            $request->email       =        $request->get('email');
            $request->phone       =        $request->get('phone');
            $request->date        =        $request->get('date');
            $request->time        =        $request->get('time');
            $request->people      =        $request->get('people');
            $request->message     =        $request->get('message');

            return redirect()->back()->with('success', 'A table reserved for you has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
        return redirect()->back()->with('success', 'Your reservation has been cancelled');
    }
}
