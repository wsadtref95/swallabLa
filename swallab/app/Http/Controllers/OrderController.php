<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getPickupTime(Request $request)
    {
        $current_time = $request->input('current_time');
        $current_day = strtolower(date('l', strtotime($current_time)));
        $current_hour = intval(date('H', strtotime($current_time)));
        $current_minute = intval(date('i', strtotime($current_time)));

        $restaurantInfo = DB::table('restaurant_info')->where('id', 1)->first();

        $is_weekday = in_array($current_day, json_decode($restaurantInfo->weekday));
        $is_holiday = in_array($current_day, json_decode($restaurantInfo->holiday));

        $wOpeningHours = json_decode($restaurantInfo->wOpeningHours);
        $hOpeningHours = json_decode($restaurantInfo->hOpeningHours);

        $opening_hours = $is_weekday ? $wOpeningHours : $hOpeningHours;

        $start_hour = intval($opening_hours[0]);
        $start_min = intval($opening_hours[1]);
        $closing_hour = intval($opening_hours[2]);
        $closing_min = intval($opening_hours[3]);

        if ($current_minute >= $closing_min) {
            if ($current_hour + 1 >= $closing_hour) {
                $current_hour = $start_hour;
                $current_minute = $start_min;
            } else {
                $current_hour += 1;
                if ($current_hour < $start_hour || ($current_hour == $start_hour && $current_minute < $start_min)) {
                    $current_hour = $start_hour;
                    $current_minute = $start_min;
                }
            }
        } else {
            if ($current_hour + 1 <= $closing_hour) {
                if ($current_hour + 1 < $start_hour || ($current_hour + 1 == $start_hour && $current_minute < $start_min)) {
                    $current_hour = $start_hour;
                    $current_minute = $start_min;
                } else {
                    $current_hour += 1;
                }
            }
        }

        return response()->json([
            'hour' => $current_hour,
            'minute' => $current_minute
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'utensils' => 'required|boolean',
            'credit_card' => 'required|string',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required|string',
            'cart_items' => 'required|json', 
        ]);

        // 创建订单
        $order = Order::create([
            'user_id' => Auth::id(),
            'utensils' => $request->utensils,
            'credit_card' => $request->credit_card,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'total' => $request->total,
        ]);

       
        $cartItems = json_decode($request->cart_items, true);

        foreach ($cartItems as $item) {
            
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'restaurants_id' => $item['id'], 
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return redirect()->back()->with('success', '訂單接收! 購物車已清空!')->with('clearCart', true);
    }
}
