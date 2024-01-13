<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Card;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        Category::create($requestData);

        return redirect()->route('categories.index')->with('success', __('words.CategoryCreatedSuccessfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($categories)
    {
        $category = Category::all()->find($categories);
        return view('admin.Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categories)
    {
        $category = Category::all()->find($categories);
        return view('admin.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
        $requestData = $request->all();
        Category::find($category)->update($requestData);
        return redirect()->route('categories.index')->with('warning', __('words.CategoryEditedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        $categories = Category::findOrFail($category);
        Card::where('category_id', $category)->delete();
        $categories->delete();

        return redirect()->route('categories.index')->with('danger', __('words.CategoryDeletedSuccessfully'));
    }
}
