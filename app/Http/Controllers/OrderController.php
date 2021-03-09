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
                
       //        -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
               -> join('orders', 'orders.id', '=', 'dish_order.order_id')
               -> select('orders.*' )
        //       -> groupBy('orders.id')
         //        -> select('orders.*' )
                     -> where('user_id', $loggedUserId)   // metteere un numero a caso per simulare un id con degli ordini
                  -> groupBy('orders.id')
                //   
          //     -> orderBy('dish_id')
                -> get();

            // #################################
            // $test = Auth::user();
            // $dishes = $test -> dishes;

            // $orders = [];

            // for ($i=0; $i < count($dishes); $i++) { 
            //     $orders[] = $dishes[$i] -> orders;
            //     // dd($dishes[$i] -> orders);

            //     foreach ($dishes[$i] -> orders as $value) {
            //         dd($value -> dishes);
            //     }
            // }

            // $dishes_2 = Dish::findOrFail($dishes);
        // dd(array_unique($orders));



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
    //riga 57 temporanea - modifica rispetto a versione del 8/marzo è l'order by date
  //      $orders = DB::table('orders') -> orderBy('date') -> get();

  //  dd($orders);
        return view ('pages.orders-index', compact('orders'));

    }

}
