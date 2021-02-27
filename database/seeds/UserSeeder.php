<?php

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

                $typology = Typology::inRandomOrder() -> limit(3) -> get();

                $user -> typologies() -> attach($typology);
            });
    }
}
