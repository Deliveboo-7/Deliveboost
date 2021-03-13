<?php

use App\Dish;
use App\Typology;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 25)
            -> create()
            -> each(function ($user) {

//                $dishes = Dish::inRandomOrder() -> limit(rand(1, 4)) -> get();
//                $user -> dishes() -> attach($dishes);

                $typology = Typology::inRandomOrder() -> limit(rand(1, 4)) -> get();

                $user -> typologies() -> attach($typology);

            });
    }
}
