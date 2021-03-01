<?php

use App\Dish;
use App\Order;
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
        factory(Order::class, 30)
            -> create()
            -> each(function ($order) {

                $dish = Dish::inRandomOrder() -> limit(3) -> get();
                $order -> dishes() -> attach($dish);
            });
    }
}
