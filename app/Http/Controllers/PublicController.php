<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; // importo AUTH per poter utilizzare i dettagli utente loggato
use Illuminate\Support\Facades\Mail;

use App\Mail\OrderMail;

use App\Typology;
use App\User;
use App\Order;
use App\Dish;
use Braintree;
use Illuminate\Support\Facades\DB;
use DateTime;





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

    //CHECKOUT AND PAYMENT
    public function checkout() {

        $orders = Order::all();
        $dishes = Dish::all();
        return view('pages.checkout');
    }

    public function payment(Request $request){

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $data = $request -> all();

        $validateData = $request -> validate([
            
            'customer_name' => 'required|string|max:30',
            'customer_address' => 'required|string',
            'customer_phone' => 'required',
            'total_price' => 'required'

        ]);
    
        // dd($data);
        $amount = $data['total_price'];
        
        $nonce = $request -> input('payment_method_nonce');
        // dd($data['items']);   
        // DATA FOR EMAIL
        $dishes = collect($data['items']);
        $cartList = $dishes -> zip($data['qty']);
        
        //ADDING FORM FIELDS TO BRAINTREE
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        //TRANSACTION VERIFICATION
        if ($result -> success) {

            $transaction = $result->transaction;
    
            //DATA NEW ORDER
            $data['code'] = $transaction -> id;
            $data['status'] = $transaction -> status;
            $data['date']= $transaction -> createdAt;
            $data['total_price'] *= 100;

            $newOrder = Order::create($data);
            
            $dishesId = explode(',', $data['dishes']);
            $dishes = Dish::findOrFail($dishesId);
            $newOrder -> dishes() -> attach($dishes);

            //CONFIRMATION ORDER MAIL
            $restaurant = User::findOrFail($data['selectedRestaurant']);
            $email = $restaurant -> email;
            $restName = $restaurant -> company_name;
   
            Mail::to($email)
            ->send(new OrderMail($cartList -> toArray(), $email, $restName));

    
            return view('pages.payment-successful', compact('transaction'));
    
        } else {
            
            $errorString = "";
    
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            return view('pages.payment-unsuccessful', compact('errorString'));
        }
        
    }

}
