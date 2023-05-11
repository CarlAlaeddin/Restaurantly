<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $tags = Tag::query()->orderBy('id', 'desc')->paginate(10);
        return view('Admin.pages.tag.index', compact(['tags']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTagRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTagRequest $request): RedirectResponse
    {
        $tag = new Tag([
            'tag'       =>  $request->get('tag'),
            'status'    =>  $request->get('status'),
        ]);

        $tag->save();
        return redirect()->route('tag.index')->with('success','The desired tag was edited correctly');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Tag $tag
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Tag $tag): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTagRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function update(UpdateTagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->tag       =   $request->get('tag');
        $tag->status    =   $request->get('status');
        $tag->slug      =   null;
        $tag->update();
        return redirect()->route('tag.index')->with('success', 'The new tag was edited correctly');
    }

    /**
     * Remove the specified resource from storage.
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect()->route('tag.index')->with('success','The desired tag was successfully deleted');
    }
}
