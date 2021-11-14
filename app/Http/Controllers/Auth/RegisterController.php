<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Typology;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Faker\Generator as Faker;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use \App\Http\Traits\RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name' => ['required', 'string', 'min:10','max:100'],
            'address' => ['required', 'string','min:10','max:200'],
            'vat' => ['required', 'digits_between:11,11', 'unique:users'],
            'phone_number' => ['required', 'digits_between:10,20', 'unique:users'],
            'opening_info' => ['required', 'string'],
            'website' => ['required', 'string'],
            'typologies' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $faker = \Faker\Factory::create();

        $newUser = User::create([

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company_name' => $data['company_name'],
            'address' => $data['address'],
            'vat' => $data['vat'],
            'phone_number' => $data['phone_number'],
            'opening_info' => $data['opening_info'],
            'website' => $data['website'],
            'vote_average' => rand(1,3),
            'delivery_time' => $faker->randomElement(['5', '10', '15','20', '25', '30']),
            'price_range'=> $faker->randomElement(['€', '€€', '€€€']),
        ]);

        $typologies = Typology::findOrFail($data['typologies']);
        $newUser -> typologies() -> attach($typologies);

        return $newUser;

    }
}
