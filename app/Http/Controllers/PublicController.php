<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Typology;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {

        $typologies = Typology::all();
        return view('pages.homepage', compact('typologies'));
    }

    public function getRestaurantMenu($id) {
        $restaurant = User::findOrFail($id);

        return view('pages.menu-index', compact('restaurant'));

    }
}
