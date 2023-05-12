<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()->orderBy('id','desc')->paginate(10);
        return view('Admin.pages.category.index',compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category([
           'name'   =>  $request->get('name'),
           'status' =>  $request->get('status'),
           'user_id'=>  auth()->user()->id
        ]);

        $category->save();
        return redirect()->route('category.index')->with('success','The new category was registered correctly');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Category $category): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->name     =   $request->get('name');
        $category->user_id  =   auth()->user()->id;
        $category->status   =   $request->get('status');
        $category->update();
        return redirect()->route('category.index')->with('success','Category editing was done correctly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Uncategorized successfully');
    }
}
