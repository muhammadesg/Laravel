<?php

namespace App\Http\Controllers;

use App\Models\Accordion;
use Illuminate\Http\Request;

class AccordionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accordions = Accordion::all();
        return view('admin.Accordion.index', compact('accordions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Accordion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        Accordion::create($requestData);

        return redirect()->route('accordions.index')->with('success', __('words.LocationCreatedSuccessfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($accordions)
    {
        $accordion = Accordion::all()->find($accordions);
        return view('admin.Accordion.show', compact('accordion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($accordions)
    {
        $accordion = Accordion::all()->find($accordions);
        return view('admin.Accordion.edit', compact('accordion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $accordion)
    {
        $requestData = $request->all();
        Accordion::find($accordion)->update($requestData);
        return redirect()->route('accordions.index')->with('warning', __('words.LocationEditedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($accordion)
    {
        $accordions = Accordion::findOrFail($accordion);
        $accordions->delete();

        return redirect()->route('accordions.index')->with('danger', __('words.LocationDeletedSuccessfully'));
    }
}
