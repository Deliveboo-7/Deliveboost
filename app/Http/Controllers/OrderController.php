<?php

namespace App\Http\Controllers;
use App\Dish;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\Chart;



class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // private function getOrders() {


    //     $orders = DB::table('users')
    //             -> join('dishes', 'users.id', '=', 'dishes.user_id')
    //             -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
    //             -> join('orders', 'orders.id', '=', 'dish_order.order_id')
    //             -> select('orders.*', DB::raw('COUNT(dishes.id) as dishes'))
    //             -> groupBy('orders.id')
    //             -> where('user_id', $loggedUserId)   
    //             -> get();
    //     return
    // }

    public function index(){

        $loggedUserId = Auth::user() -> id;

        $orders = DB::table('users')
                -> join('dishes', 'users.id', '=', 'dishes.user_id')
                // fino a qua con il dd ci stampa tutti i piatti, unendogli le info dell'user
                -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
                //               -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
                -> join('orders', 'orders.id', '=', 'dish_order.order_id')
                -> select('orders.*', DB::raw('COUNT(dishes.id) as dishes'))
                -> groupBy('orders.id')
                 //        -> select('orders.*' )
                -> where('user_id', $loggedUserId)   
                    // metteere un numero a caso per simulare un id con degli ordini
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



    public function chartIndex() {


        $loggedUserId = Auth::user() -> id;
        // $month = array('gen', 'feb', 'marz', 'aprile', 'maggi', 'giugno', 'luglio', 'agos', 'sett', 'ott', 'nov', 'dic');

        //DB::enableQueryLog();
        $groups = DB::table('users')
        -> join('dishes', 'users.id', '=', 'dishes.user_id')
        -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        -> join('orders', 'orders.id', '=', 'dish_order.order_id')
        -> select(DB::raw('SUM(orders.total_price / 100) as income'), DB::raw('YEAR(orders.date) as year'))
        
        

        -> groupBy('year')


        -> where('user_id', 12 ) // $loggedUserId   //   12
        //-> orderBy('date')

        // $groups = DB::table('users')
        // -> join('dishes', 'users.id', '=', 'dishes.user_id')
        // -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        // -> join('orders', 'orders.id', '=', 'dish_order.order_id')
        // -> select('orders.date', DB::raw('COUNT(orders.total_price) as total_price'))
        // -> groupBy('orders.date')
        // -> where('user_id', 12 ) // $loggedUserId   //   12
        //-> orderBy('date')


        //esempio di somma laravel $groups = DB::table('users')->sum('id');
        //esempio raw:
        // $groups = DB::table("users")
	    // ->select(DB::raw("SUM(id) as count"))
	    // ->groupBy(DB::raw("year(created_at)"))
	    // ->get();

        // $groups = DB::table('users')
        // -> join('dishes', 'users.id', '=', 'dishes.user_id')
        // -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        // -> join('orders', 'orders.id', '=', 'dish_order.order_id')
        // -> select('orders.*', DB::raw('COUNT(dishes.id) as dishes'))
        // -> groupBy('orders.id')      
        // -> where('user_id', 12 ) // $loggedUserId   //   12
        //  -> orderBy('date')


        //-> get();
        ->pluck('income', 'year')->all();
       // dd(DB::getQueryLog());




        //dd($groups);   
        //dd(array_keys($groups));   // le date in cui sono stati effettuati gli ordiniw
        //dd(array_values($groups)); //i valori 

        // Generate random colours for the groups
        for ($i=0; $i<=count($groups); $i++) {
            //$colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            $colours[] = '#000000';          
        }

        // Prepare the data for returning with the view
        $chart = new Chart;
            $chart->labels = (array_keys($groups));
            $chart->dataset = (array_values($groups));
            $chart->colours = $colours;
        //return view('pages.statistics-index', compact('chart'));

        //var dates = chart.dates;
        //var data = chart.data;

        
        //___________________________________________________________
        //___________________________________________________________
        //___________________________________________________________
        //___________________________________________________________




    


        //$loggedUserIdM = Auth::user() -> id;
        $groupsMonth = DB::table('users')
        -> join('dishes', 'users.id', '=', 'dishes.user_id')
        -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        -> join('orders', 'orders.id', '=', 'dish_order.order_id')
        -> select(DB::raw('SUM(orders.total_price / 100) as income'), DB::raw('MONTH(orders.date) as month'))
        -> groupBy('month')
        -> where('user_id', 12 ) // $loggedUserIdM   //   12
        ->pluck('income', 'month')->all();
        for ($i=0; $i<=count($groupsMonth); $i++) {
            $coloursMonth[] = 'green';          
        }

        $chartMonth = new Chart;
            $chartMonth->labels = (array_keys($groupsMonth));
            $chartMonth->dataset = (array_values($groupsMonth));
            $chartMonth->colours = $coloursMonth;
        return view('pages.statistics-index', compact('chart', 'chartMonth'));

        
    }


    

}
    //     $orders = DB::table('users')
    //             -> join('dishes', 'users.id', '=', 'dishes.user_id')
    //             -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
    //             -> join('orders', 'orders.id', '=', 'dish_order.order_id')
    //             -> select('orders.*', DB::raw('COUNT(dishes.id) as dishes'))
    //             -> groupBy('orders.id')
    //             -> where('user_id', $loggedUserId)   









/*
            // Get users grouped by total_price
            $groups = DB::table('orders')
            ->select('total_price', 'date')
            ->groupBy('total_price', 'date')
            ->pluck('total_price')->all();
            // Generate random colours for the groups
            for ($i=0; $i<=count($groups); $i++) {
                $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            }
            // Prepare the data for returning with the view
            $chart = new Chart;
                $chart->labels = (array_keys($groups));
                $chart->dataset = (array_values($groups));
                $chart->colours = $colours;
            return view('pages.statistics-index', compact('chart'));
*/




//______________________________________________ QUA PREPARO I DATI PER IL SECONDO GRAFICO