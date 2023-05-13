<?php

namespace App\Http\Controllers;

use App\Models\special;
use App\Http\Requests\StorespecialRequest;
use App\Http\Requests\UpdatespecialRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $specials = Special::query()->orderBy('id','desc')->paginate(10);
        return view('Admin.pages.special.index',compact(['specials']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.special.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StorespecialRequest $request
     * @return RedirectResponse
     */
    public function store(StorespecialRequest $request): RedirectResponse
    {
        $image = time() . '-special' . '.' . $request->file('image')->getClientOriginalExtension();

        $request->image->move('images/special', $image);

        $image = new Special([
            'user_id'        => auth()->user()->id,
            'image'          => $image,
            'menu_name'      => str_replace(' ','_',$request->get('menu_name')),
            'title'          => $request->get('title'),
            'description'    => $request->get('description'),
            'status'         => $request->get('status'),
        ]);

        $image->save();
        return redirect()->route('special.index')->with('success', 'The new special menu was registered correctly');
    }

    /**
     * Display the specified resource.
     * @param special $special
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(special $special): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.special.show',compact(['special']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param special $special
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(special $special): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.special.edit',compact(['special']));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatespecialRequest $request
     * @param special $special
     * @return RedirectResponse
     */
    public function update(UpdatespecialRequest $request, special $special): RedirectResponse
    {
        if (!is_null($request->file('image'))) {
            $image = time() . '-special' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/special', $image);
            $special->image = $image;
        }

        $special->menu_name = str_replace(' ','_',$request->get('menu_name'));
        $special->user_id      =    auth()->user()->id;
        $special->menu_name    =    $request->get('menu_name');
        $special->slug         =    null;
        $special->title        =    $request->get('title');
        $special->description  =    $request->get('description');
        $special->status       =    $request->get('status');
        $special->update();
        return redirect()->route('special.index')->with('success', 'Your special menu has been successfully edited');


    }

    /**
     * Remove the specified resource from storage.
     * @param special $special
     * @return RedirectResponse
     */
    public function destroy(special $special): RedirectResponse
    {
        $special->delete();
        return redirect()->route('special.index')->with('success', 'The special menu was successfully deleted');
    }
}
