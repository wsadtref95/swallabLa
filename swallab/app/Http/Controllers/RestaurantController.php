<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Meal;


class RestaurantController extends Controller
{
    public function showRestaurants()
    {
        // 查詢與 admin 用戶關聯的所有餐廳
        $restaurants = Restaurant::whereHas('user', function ($query) {
            $query->where('role', 'admin');
        })->get();

        // 傳遞數據給視圖
        return view('restaurant.homepage', compact('restaurants'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'average_price' => 'required|numeric|min:0',
            'class' => 'required|integer|between:1,6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 假設每個餐廳都與當前登入的用戶相關聯
        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $imagePath;
        }

        Restaurant::create($validatedData);

        return redirect()->route('backstage.menu')->with('success', '餐廳資料已成功新增');
    }

    // public function show($id)
    // {
    //     // 查找指定的餐廳
    //     $restaurant = Restaurant::findOrFail($id);

    //     // 獲取該餐廳的菜單（假設有一個菜單模型或者關聯）
    //     // $menuItems = $restaurant->menuItems;

    //     // 返回餐廳的詳細頁面，並傳遞餐廳資料和菜單資料
    //     return view('restaurant.detail', compact('restaurant'));
    // }


    public function index($id)
    {
        $meals = Meal::with('restaurant')->where('r_id', $id)->get(); 
        $restaurants = $meals->pluck('restaurant')->unique();
    
        return view('restaurant.detail', compact('meals', 'restaurants'));
        
    }

    public function show($id = null)
{
    if ($id) {
        // 如果提供了ID，顯示指定餐廳的菜單詳情
        $meals = Meal::with('restaurant')->where('r_id', $id)->get(); 
        $restaurant = Restaurant::findOrFail($id);
        
        return view('restaurant.detail', compact('meals', 'restaurant'));
    } else {
        // 如果沒有提供ID，顯示所有與admin用戶關聯的餐廳
        $restaurants = Restaurant::whereHas('user', function ($query) {
            $query->where('role', 'admin');
        })->get();

        return view('restaurant.homepage', compact('restaurants'));
    }
}

}
