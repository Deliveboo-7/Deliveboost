<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table -> id();

            $table -> string('email', 100)->unique();
            $table -> string('password');
            $table -> string('company_name', 100);
            $table -> string('address', 200);
            $table -> string('vat', 11) -> unique();
            $table -> string('phone_number', 20) -> unique();
            $table -> text('opening_info');
            $table -> string('website');
            $table -> string('delivery_time');
            $table -> string('price_range');
            $table -> tinyInteger('vote_average') -> unsigned();

            $table -> rememberToken();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
