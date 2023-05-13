<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $galleries = Gallery::query()->orderBy('id','desc')->paginate(10);
        return view('Admin.pages.gallery.index',compact(['galleries']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreGalleryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreGalleryRequest $request): RedirectResponse
    {
        $image = time() . '-gallery' . '.' . $request->file('image')->getClientOriginalExtension();
        $gallery = new Gallery([
            'status'    =>  $request->get('status'),
            'user_id'   =>  auth()->user()->id,
            'image'    =>  $image
        ]);

        $gallery->save();
        $request->image->move('images/gallery', $image);
        return redirect()->route('gallery.index')->with('success', 'Your gallery has been successfully created');
    }

    /**
     * Display the specified resource.
     * @param Gallery $gallery
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Gallery $gallery): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.gallery.show',compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Gallery $gallery
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Gallery $gallery): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateGalleryRequest $request
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery): RedirectResponse
    {
        if (!is_null($request->file('image'))) {
            if (is_dir('/images/gallery'.$gallery->image))
            {
                unlink('images/gallery/'.$gallery->image);
            }
            $image = time() . '-gallery' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/gallery', $image);
            $gallery->image = $image;
        }

        $gallery->status    = $request->get('status');
        $gallery->user_id   =   auth()->user()->id;

        $gallery->update();
        return redirect()->route('gallery.index')->with('success', 'Your Gallery has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Your chef has been successfully deleted');
    }
}
