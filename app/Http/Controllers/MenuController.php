<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $menus = Menu::query()->orderBy('id','desc')->paginate(10);
        return view('Admin.pages.menu.index',compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param Menu $menu
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Menu $menu): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.menu.show',compact(['menu']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|Application|Factory|View
     */
    public function edit(Menu $menu): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        return view('Admin.pages.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success','The menu was successfully deleted');
    }
}
