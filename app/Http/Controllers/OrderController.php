<?php

namespace App\Http\Controllers;
use App\Dish;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $loggedUserId = Auth::user() -> id;

        $orders = DB::table('users')
                -> join('dishes', 'users.id', '=', 'dishes.user_id')
                -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
                -> join('orders', 'orders.id', '=', 'dish_order.order_id')
//                -> select('orders.*')
                -> where('user_id', $loggedUserId)
//                -> groupBy('orders.id')
                -> get();

//        dd($orders);

//        DB::raw('COUNT(dishes.id) as dishes') - NON CANCELLARE

//        $result = Dish::with(['user', 'orders' => function ($q) {
//            dd($q -> orders());
//        }])->get();
//        $dishes = $loggedUserId -> dishes;
//        $orders = [];
//        $dishes = Dish::with('orders', 'user')->get();
//        foreach ($dishes as $dish) {
//
//            $userOfDish = $dish -> user_id;
//            $ordersWithDish = $dish -> orders;
//
//            if ($userOfDish === $loggedUserId && count($ordersWithDish) > 0) {
//
//                foreach ($ordersWithDish as $order) {
//                    $orders[] = $order;
//
//                }
//            }
//
//        }

        return view ('pages.orders-index', compact('orders'));

    }

}
