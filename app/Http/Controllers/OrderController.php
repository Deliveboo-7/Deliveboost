<?php

namespace App\Http\Controllers;
use App\Order;
// use App\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use App\Chart;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $orders = Order::whereHas('dishes', function($query) {
            $query->where('user_id', auth()->id());
        })
            ->with(['dishes' => function($query) {
                $query->where('user_id', auth()->id());
            }])
            ->get();

        return view ('pages.orders-index', compact('orders'));

    }


}
