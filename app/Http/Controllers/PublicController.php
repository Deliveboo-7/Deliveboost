<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use Braintree;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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

    public function payment(Request $request){

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        // dd($gateway);
        
        $amount = $request -> input('amount');
        $nonce = $request -> input('payment_method_nonce');
    
        //TRANSACTION VERIFICATION
    
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        // dd($nonce);
    
        if ($result -> success) {
            $transaction = $result->transaction;
    
            return view('pages.success', compact('transaction'));
    
        } else {
    
            
            $errorString = "";
    
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            
        }
    
    }
}
