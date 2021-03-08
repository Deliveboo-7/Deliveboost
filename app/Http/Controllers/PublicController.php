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

        // $gateway = new Braintree\Gateway([
        //     'environment' => config('services.braintree.environment'),
        //     'merchantId' => config('services.braintree.merchantId'),
        //     'publicKey' =>config('services.braintree.publicKey'),
        //     'privateKey' => config('services.braintree.privateKey')
        // ]);
    
        // $token = $gateway->ClientToken()->generate();

        return view('pages.checkout');
    }

    public function paySuccess() {
        return view('pages.paySuccess');
    }
    public function payUnsuccess() {
        return view('pages.payUnsuccess');
    }

}
