<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*

*/
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
        $orders = DB::table('orders') -> orderBy('id') -> get();

        // $orders = DB::table('orders') -> where('user_id', $loggedUserId) -> orderBy('id') -> get();


        return view ('pages.orders-index', compact('orders'));

    }

}
