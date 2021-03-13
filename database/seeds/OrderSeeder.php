<?php

use App\Dish;
use App\Order;
use App\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 100)
            -> create()
            -> each(function ($order) {

                $randomUser = User::inRandomOrder() -> first();
                $dishes = $randomUser -> dishes() -> limit(rand(1, 6)) -> get();

                $order -> dishes() -> attach($dishes);
            });
    }
}
