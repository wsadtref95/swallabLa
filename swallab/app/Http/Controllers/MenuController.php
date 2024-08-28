<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Meal;

class MenuController extends Controller
{


    public function index()
    {
        $meals = Meal::with('restaurant')->where('r_id', 4)->get(); 
        $restaurants = $meals->pluck('restaurant')->unique();
        return view('restaurant.detail', compact('meals', 'restaurants'));
    }

    public function index2()
    {
        $restaurants = restaurant::where('r_id', 2)->get();
        return view('/restaurant/detail2', compact('restaurants'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'foodName' => 'required|string|max:255',
            'foodPrice' => 'required|numeric',
            'foodPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,avif,svg|max:10240',
        ]);

        $foodPhoto = $request->file('foodPhoto');
        $photoName = time() . '.' . $foodPhoto->getClientOriginalExtension();
        $foodPhoto->move(public_path('storage/photos'), $photoName);

        $menu = new Menu();
        $menu->food_name = $request->foodName;
        $menu->food_price = $request->foodPrice;
        $menu->food_photo = $photoName;
        $menu->user_id = Auth::id();
        $menu->save();

        return redirect()->back()->with('success', '菜單已成功添加');
    }
}
