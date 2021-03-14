<?php

namespace App\Http\Controllers;

// use App\Order;
// use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Chart;

class ChartController extends Controller
{

    public function index()
    {
        $loggedUserId = Auth::user() -> id;

        //------------------------------------
        // BY YEAR
        //------------------------------------

        $groupsYear = DB::table('users')
        -> join('dishes', 'users.id', '=', 'dishes.user_id')
        -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        -> join('orders', 'orders.id', '=', 'dish_order.order_id')
        -> select(DB::raw('SUM(orders.total_price / 100) as income'), DB::raw('YEAR(orders.date) as year'))
        -> groupBy('year')
        -> where('user_id', $loggedUserId ) // $loggedUserId   //   12
        ->pluck('income', 'year')->all();

        // Generate colour for  groups
        for ($i=0; $i<=count($groupsYear); $i++) {
            //$colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            $coloursYear[] = '#000000';
        }

        // Prepare the data for returning with the view
        $chartYear = new Chart;
            $chartYear->labels = (array_keys($groupsYear));
            $chartYear->dataset = (array_values($groupsYear));
            $chartYear->colours = $coloursYear;

        //------------------------------------
        // BY MONTH
        //------------------------------------

        $groupsMonth = DB::table('users')
        -> join('dishes', 'users.id', '=', 'dishes.user_id')
        -> join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        -> join('orders', 'orders.id', '=', 'dish_order.order_id')
        -> select(DB::raw('SUM(orders.total_price / 100) as income'), DB::raw('MONTHNAME(orders.date) as month'))
        -> groupBy('month')
        ->orderByRaw( "FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')" )
        -> where('user_id', $loggedUserId ) // $loggedUserId   //   12
        ->pluck('income', 'month')->all();
        for ($i=0; $i<=count($groupsMonth); $i++) {
            $coloursMonth[] = 'green';
        }

        $chartMonth = new Chart;
            $chartMonth->labels = (array_keys($groupsMonth));
            $chartMonth->dataset = (array_values($groupsMonth));
            $chartMonth->colours = $coloursMonth;
        return view('pages.statistics-index', compact('chartYear', 'chartMonth'));
    }

}
