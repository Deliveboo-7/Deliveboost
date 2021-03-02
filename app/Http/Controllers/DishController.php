<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $dishes = Dish::all();

        return view ('pages.dishes-index', compact('dishes')); 

    }

    // ----------------------- CREATE & STORE -------------------
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

    // ----------------------- EDIT -------------------


    public function edit($id){

        $loggedUser = Auth::user();
        $dish = Dish::findOrFail($id);

        if($dish -> user_id === $loggedUser -> id ){

            return view('dishes-edit', compact('dish'));

        } else {

            return redirect() -> route('home');

        }
    }


    // -----------------------  UPDATE  -------------------


    public function update(Request $request, $id){

        $loggedUser = Auth::user();
        $data = $request -> all();
        $dish = Dish::findOrFail($id);

        if($dish -> user_id === $loggedUser -> id ){

            $validatedData = $request -> validate([
                'name' => 'required|string|min:5|max:50',
                'desc' => 'required|string|min:20',
                'price' => 'required',
                'visible' => 'required',
            ]);

            $dish -> update($validatedData);
            // return view('home', compact('dish'));

        } else {

            return redirect() -> route('home');

        }
    
    }
}
