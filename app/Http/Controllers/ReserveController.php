<?php

namespace App\Http\Controllers;

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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * Display the specified resource.
     */
    public function show(Reserve $reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserve $reserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserve $reserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserve $reserve)
    {
        //
    }
}
