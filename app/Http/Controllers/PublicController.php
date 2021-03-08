<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;

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

    public function checkout() {

        // $gateway = new Braintree\Gateway([
        //     'environment' => config('services.braintree.environment'),
        //     'merchantId' => config('services.braintree.merchantId'),
        //     'publicKey' =>config('services.braintree.publicKey'),
        //     'privateKey' => config('services.braintree.privateKey')
        // ]);
    
        // $token = $gateway->ClientToken()->generate();

        return view('pages.checkout');
    }
}
