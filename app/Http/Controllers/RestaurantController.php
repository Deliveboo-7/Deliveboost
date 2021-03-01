<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Dish;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        return view('dishes-create');
    }


    public function store(Request $request){
    
        $data = $request -> all();

        $validatedData = $request -> validate([
            'name' => 'required|string|min:5|max:50',
            'desc' => 'required|string|min:20',
            'price' => 'required',
            'visible' => 'required',
            ]);

    
        $data['price'] *= 100;

        $loggedUser = Auth::user();
        $newDish = Dish::make($data);
        $newDish -> user() -> associate($loggedUser);
        $newDish -> save();

        return redirect() -> route('home');

        
    }




}








