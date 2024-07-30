<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodItem;

class FoodItemController extends Controller
{

    public function index()
    {
        $foodItems = FoodItem::all();
        return view('food_items.index', compact('foodItems'));
    }

    public function create()
    {
        return view('food_items.create');
    }

    public function edit($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        return view('food_items.edit', compact('foodItem'));
    }

    public function destroy($id)
    {
        $foodItem = FoodItem::find($id);
        if ($foodItem) {
            $foodItem->delete();
        }

        return redirect()->route('food_items.index')->with('success', 'Food item deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'price' => 'required|numeric',
            'store_name' => 'required|string|max:255',
        ]);

        $foodItem = FoodItem::findOrFail($id);
        $foodItem->update($validatedData);

        return redirect()->route('food_items.index')->with('success', 'Food item updated successfully');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'price' => 'required|numeric',
            'store_name' => 'required|string|max:255',
        ]);

        FoodItem::create($validatedData);

        return redirect()->route('food_items.index')->with('success', 'Food item created successfully');
    }
}
