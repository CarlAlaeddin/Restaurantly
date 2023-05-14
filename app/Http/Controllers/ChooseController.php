<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChooseRequest;
use App\Models\Choose;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $chooses = Choose::query()->orderBy('id','desc')->paginate(10);
        return view('Admin.pages.choose.index',compact(['chooses']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.choose.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreChooseRequest $request
     * @return RedirectResponse
     */
    public function store(StoreChooseRequest $request): RedirectResponse
    {
        $choose = new Choose([
            'user_id'       =>      auth()->user()->id,
            'title'         =>      $request->get('title'),
            'description'   =>      $request->get('description'),
            'status'        =>      $request->get('status'),
        ]);

        $choose->save();
        return redirect()->route('choose.index')->with('success', 'The new choose was registered correctly');
    }

    /**
     * Display the specified resource.
     * @param Choose $choose
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Choose $choose): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.choose.show',compact(['choose']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Choose $choose
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Choose $choose): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.choose.edit',compact(['choose']));
    }

    /**
     * Update the specified resource in storage.
     * @param StoreChooseRequest $request
     * @param Choose $choose
     * @return RedirectResponse
     */
    public function update(StoreChooseRequest $request, Choose $choose): RedirectResponse
    {
        $choose->user_id = auth()->user()->id;
        $choose->update($request->all());
        return redirect()->route('choose.index')->with('success', 'Your choose has been successfully edited');
    }


    /**
     * Remove the specified resource from storage.
     * @param Choose $choose
     * @return RedirectResponse
     */
    public function destroy(Choose $choose): RedirectResponse
    {
        $choose->delete();
        return redirect()->route('choose.index')->with('success', 'Your choose has been successfully deleted');
    }
}
