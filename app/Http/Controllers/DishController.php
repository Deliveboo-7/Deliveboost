<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $loggedUserId = Auth::user() -> id;
        $dishes = DB::table('dishes') -> where('user_id', $loggedUserId) -> orderBy('name') -> get();

        return view ('pages.dishes-index', compact('dishes'));

    }

    // ----------------------- CREATE & STORE -------------------
    public function create(){

        return view('pages.dishes-create');
    }


    public function store(Request $request){

        $request = $this -> setPriceInteger($request);

        $validatedData = $request -> validate([
            'name' => 'required|string|min:5|max:50',
            'desc' => 'required|string|min:5',
            'price' => 'required',
            'visible' => 'required',
        ]);


        

        $loggedUser = Auth::user();
        $newDish = Dish::make($validatedData);
        $newDish -> user() -> associate($loggedUser);
        $newDish -> save();

        return redirect() -> route('dishes-index') -> with('created', 'Dish created successfully!');


    }

    // ----------------------- EDIT -------------------


    public function edit($id){

        $loggedUser = Auth::user();
        $dish = Dish::findOrFail($id);

        if($dish -> user_id === $loggedUser -> id ){

            return view('pages.dishes-edit', compact('dish'));

        } else {

            return redirect() -> route('dashboard');

        }
    }


    


    // -----------------------  UPDATE  -------------------


    public function update(Request $request, $id){

        $loggedUser = Auth::user();
        
        $dish = Dish::findOrFail($id);
        

        if($dish -> user_id === $loggedUser -> id ){

            $request = $this -> setPriceInteger($request);
            $validatedData = $request -> validate([
                'name' => 'required|string|min:5|max:50',
                'desc' => 'required|string|min:5',
                'price' => 'required',
                'visible' => 'required',
            ]);

            $dish -> update($validatedData);

            return redirect() -> route('dishes-index');

        } else {

            return redirect() -> route('dashboard');

        }

    }


    private function setPriceInteger($request){

      
        $price = $request ->get('price') * 100;

        $request -> merge([
                'price'  => $price
        ]);

        return $request;

    }
}
