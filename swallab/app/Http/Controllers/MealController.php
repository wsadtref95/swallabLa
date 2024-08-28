<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Foundation\Auth\User;

class MealController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'meals_name' => 'required|string|max:255',
            'class' => 'required|numeric|min:1|max:10',
            'price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $restaurant = auth()->user()->restaurant; // 獲取當前使用者的餐廳

        $meal = new Meal([
            'meals_name' => $request->meals_name,
            'class' => $request->class,
            'price' => $request->price,
            'photo' => $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null,
        ]);

        $restaurant->meals()->save($meal); // 將菜單項目與餐廳關聯並保存

        return redirect()->back()->with('success', '餐點已成功新增');
    }
}
