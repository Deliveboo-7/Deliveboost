<?php

namespace App\Http\Controllers;

use App\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;

class ChartController extends Controller
{

    public function index()
    {
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
    }

}




// public function index()
// {
//     // Get users grouped by total_price
//     $groups = DB::table('orders')
//             ->select('total_price', DB::raw('count(*) as total'))
//             ->groupBy('total_price')
//             ->pluck('total', 'total_price')->all();
//     // Generate random colours for the groups
//     for ($i=0; $i<=count($groups); $i++) {
//         $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
//     }
//     // Prepare the data for returning with the view
//     $chart = new Chart;
//         $chart->labels = (array_keys($groups));
//         $chart->dataset = (array_values($groups));
//         $chart->colours = $colours;
//     return view('pages.statistics-index', compact('chart'));
//     }
// }


