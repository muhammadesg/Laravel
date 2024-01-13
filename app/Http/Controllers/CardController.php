<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        return view('admin.Card.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $categories = Category::all();
        return view('admin.Card.create', compact('categories'));
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
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp,gif',
            'price' => 'required',
            'discount' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
        }

        $requestData = $request->all();
        $requestData['image'] = $path;
        Card::create($requestData);

        return redirect()->route('cards.index')->with('success', __('words.CardCreatedSuccessfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($cards)
    {
        $card = Card::all()->find($cards);
        return view('admin.Card.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cards)
    {
        $categories = Category::all();
        $card = Card::all()->find($cards);
        return view('admin.Card.edit', compact('card','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $card)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'text_uz' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('image') == null) {
            Card::find($card)->update($requestData);
            return redirect()->route('cards.index')->with('warning', __('words.CardEditedSuccessfully'));
        } else {
            $path = $request->file('image')->store("uploads", 'public');
            $requestData['image'] = $path;
            Card::find($card)->update($requestData);
            return redirect()->route('cards.index')->with('warning', __('words.CardEditedSuccessfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($card)
    {
        $cards = Card::findOrFail($card);
        $cards->delete();

        return redirect()->route('cards.index')->with('danger', __('words.CardDeletedSuccessfully'));
    }
}
