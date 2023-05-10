<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\Tag;
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $image = time() . 'image_box_two' . '.' . $request->file('image')->getClientOriginalExtension();
        $request->image->move('images/menu', $image);


        $menu = new Menu([
            'name'      =>      $request->get('name'),
            'price'     =>      $request->get('price'),
            'status'    =>      $request->get('status'),
            'image'     =>      $image,
            'user_id'   =>      auth()->user()->id,
            'tag_id'    =>      $request->get('tag_id')
        ]);

        $menu->save();
        return redirect()->route('menu.index')->with('success','The new menu was registered correctly');


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
        $tags = Tag::query()
            ->orderBy('id','desc')
            ->where('status','LIKE',1)
            ->get();

        return view('Admin.pages.menu.edit',compact(['menu','tags']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        dd($request);
        $path = 'images/menu'.DIRECTORY_SEPARATOR.$menu->image;
        if (!is_dir($path) && !empty($request->get('image')))
        {
            unlink($path);
            $image = time() . 'image_box_two' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/menu', $image);
            $menu->image = $request->get('image');

        }
        $menu->tag->tag  =  $request->get('tag');
        $menu->update($request->all());
        $menu->tag->save();


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
