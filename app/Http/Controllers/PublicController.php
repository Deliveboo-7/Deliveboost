<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index() {

        $typologies = Typology::all();
        return view('pages.homepage', compact('typologies'));
    }

    public function getRestaurantMenu($id) {
        $restaurant = User::findOrFail($id);
        $dishes = DB::table('dishes') -> where('user_id', $restaurant -> id) -> orderBy('name') -> get();

        return view('pages.menu-index', compact('dishes', 'restaurant'));

    }

    public function checkout() {
        return view('pages.checkout');
    }
}
