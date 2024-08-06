<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $item = $request->input('item');

        // 檢查 session 中是否已有購物車，如果沒有則創建一個新的
        $cart = session()->get('cart', []);

        // 檢查購物車中是否已經有相同的商品
        $existingItemIndex = array_search($item['id'], array_column($cart, 'id'));

        if ($existingItemIndex !== false) {
            // 更新已有商品的數量
            $cart[$existingItemIndex]['quantity'] += $item['quantity'];
        } else {
            // 新增商品到購物車
            $cart[] = $item;
        }

        // 更新 session 中的購物車
        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
}
