<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{


    public function index()
    {
        $menus = Menu::all();
        return view('/restaurant/detail', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foodName' => 'required|string|max:255',
            'foodPrice' => 'required|numeric',
            'foodPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
