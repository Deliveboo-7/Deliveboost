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
    //    dd($loggedUserId);

        $orders = DB::table('users')
                -> join('dishes', 'users.id', '=', 'dishes.user_id')
                // fino a qua con il dd ci stampa tutti i piatti, unendogli le info dell'user
                -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
//               -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
                -> join('orders', 'orders.id', '=', 'dish_order.order_id')
                -> select('orders.*', DB::raw('COUNT(dishes.id) as dishes'))
                -> groupBy('orders.id')
//         //        -> select('orders.*' )
                -> where('user_id', $loggedUserId)   // metteere un numero a caso per simulare un id con degli ordini
//                  -> groupBy('orders.id')
//                //
//          //     -> orderBy('dish_id')
                -> get();
//        foreach ($orders as $order) {
//            dd($order);
//        }
//        dd($orders);
            // #################################
//             $loggedUser = Auth::user();

//        $loggedUser = Auth::user();
////        $loggedUser = User::findOrFail(17);
//        $allOrders= Order::all();
//        $orders = [];
//
//        foreach ($allOrders as $order) {
//
//            $tmpOrder = [ $order -> id => $order -> dishes -> toArray() ];
//            $orders[] = $tmpOrder;
////            dd($order -> id);
//
//        }
//        dd($userOrders);
//        dd($orders);

//        DB::raw('COUNT(dishes.id) as dishes') - NON CANCELLARE

        //riga 57 temporanea - modifica rispetto a versione del 8/marzo è l'order by date
//        $orders = DB::table('orders')  -> orderBy('date') -> get();

        return view ('pages.orders-index', compact('orders'));

    }

}
