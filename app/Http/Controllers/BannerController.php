<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.Banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp,gif',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
        }

        $requestData = $request->all();
        $requestData['image'] = $path;
        Banner::create($requestData);

        return redirect()->route('banners.index')->with('success', __('words.BannerCreatedSuccessfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($banners)
    {
        $banner = Banner::all()->find($banners);
        return view('admin.Banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($banners)
    {
        $banner = Banner::all()->find($banners);
        return view('admin.Banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$banner)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
            $requestData['image'] = $path;
            Banner::find($banner)->update($requestData);
            return redirect()->route('banners.index')->with('warning', __('words.BannerEditedSuccessfully'));
        } else {
            Banner::find($banner)->update($requestData);
            return redirect()->route('banners.index')->with('warning', __('words.BannerEditedSuccessfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($banner)
    {
        $banners = Banner::findOrFail($banner);
        $banners->delete();

        return redirect()->route('banners.index')->with('danger', __('words.BannerDeletedSuccessfully'));
    }
}
