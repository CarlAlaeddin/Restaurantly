<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMenuRequest;
use App\Models\Category;
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
        $menus = Menu::query()->orderBy('id', 'desc')->paginate(10);
//        dd($menus->categories());
        return view('Admin.pages.menu.index', compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $tags = Tag::query()->orderBy('id', 'desc')->where('status', 'LIKE', 1)->get();
        $categories = Category::query()->orderBy('id', 'desc')->where('status', 'LIKE', 1)->get();
        return view('Admin.pages.menu.create', compact(['tags', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $image = time() . '-image-food' . '.' . $request->file('image')->getClientOriginalExtension();

        $menu = new Menu([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'status' => $request->get('status'),
            'image' => $image,
            'user_id' => auth()->user()->id,
            'tag_id' => $request->get('tag_id'),
        ]);

        $menu->save();
        $request->image->move('images/menu', $image);
        return redirect()->route('menu.index')->with('success', 'The new menu was registered correctly');
    }

    /**
     * Display the specified resource.
     * @param Menu $menu
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Menu $menu): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.menu.show', compact(['menu']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|Application|Factory|View
     */
    public function edit(Menu $menu): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $tags = Tag::query()
            ->orderBy('id', 'desc')
            ->where('status', 'LIKE', 1)
            ->get();

        $categories = Category::query()
            ->orderBy('id', 'desc')
            ->where('status', 'LIKE', 1)
            ->get();

        return view('Admin.pages.menu.edit', compact(['menu', 'tags', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateMenuRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function update(UpdateMenuRequest $request, Menu $menu): RedirectResponse
    {
        if (!is_null($request->file('image'))) {
            $image = time() . '-image-food' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/menu', $image);
            $menu->image = $image;
        }

        $menu->name = $request->get('name');
        $menu->price = $request->get('price');
        $menu->status = $request->get('status');
        $menu->tag_id = $request->get('tag_id');
        $menu->slug = null;

        $menu->categories()->sync($request->get('category'), $menu->id);

        $menu->update();
        return redirect()->route('menu.index')->with('success', 'Your menu has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'The menu was successfully deleted');
    }

}
