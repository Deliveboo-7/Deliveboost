<?php

namespace App\Http\Controllers;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.dashboard');
    }
}








