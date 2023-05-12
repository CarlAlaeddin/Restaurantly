<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Http\Requests\StoreChefRequest;
use App\Http\Requests\UpdateChefRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $chefs = Chef::query()->orderBy('id', 'desc')->paginate(10);

        return view('Admin.pages.chef.index', compact(['chefs']));
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
     * @param StoreChefRequest $request
     * @return RedirectResponse
     */
    public function store(StoreChefRequest $request): RedirectResponse
    {
        $image = time() . '-chef' . '.' . $request->file('image')->getClientOriginalExtension();

        $chef = new Chef([
            'name'      =>  $request->get('name'),
            'twitter'   =>  $request->get('twitter'),
            'facebook'  =>  $request->get('facebook'),
            'instagram' =>  $request->get('instagram'),
            'linkedin'  =>  $request->get('linkedin'),
            'status'    =>  $request->get('status'),
            'position'  =>  $request->get('position'),
            'image'     =>  $image,
            'user_id'   =>  auth()->user()->id,
        ]);

        $request->image->move('images/chef', $image);

        return redirect()->route('chef.index')->with('success', 'The new menu was registered correctly');
    }

    /**
     * Display the specified resource.
     * @param Chef $chef
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Chef $chef): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.chef.show', compact(['chef']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Chef $chef
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Chef $chef): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.chef.edit', compact(['chef']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChefRequest $request, Chef $chef)
    {
        if (!is_null($request->file('image'))) {
            $image = time() . '-chef' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/chef', $image);
            $chef->image = $image;
        }

        $chef->name         =       $request->get('name');
        $chef->twitter      =       $request->get('twitter');
        $chef->facebook     =       $request->get('facebook');
        $chef->instagram    =       $request->get('instagram');
        $chef->linkedin     =       $request->get('linkedin');
        $chef->status       =       $request->get('status');
        $chef->position     =       $request->get('position');
        $chef->image        =       $image;
        $chef->user_id      =       auth()->user()->id;
        $chef->slug         =       null;


        $chef->update();
        return redirect()->route('chef.index')->with('success', 'Your chef has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        //
    }
}
