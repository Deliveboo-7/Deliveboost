<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('typology_user', function (Blueprint $table) {

            $table  -> foreign('user_id', "typology_user-user")
                    -> references('id')
                    -> on('users');

            $table  -> foreign('typology_id', "typology_user-typology")
                    -> references('id')
                    -> on('typologies');
        });

        Schema::table('dishes', function (Blueprint $table) {

            $table  -> foreign('user_id', "dishes-user")
                -> references('id')
                -> on('users');
        });

        Schema::table('dish_order', function (Blueprint $table) {

            $table  -> foreign('order_id', "dish_order-orders")
                -> references('id')
                -> on('orders');

            $table  -> foreign('dish_id', "dish_order-dishes")
                -> references('id')
                -> on('dishes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_order', function (Blueprint $table) {

            $table  -> dropForeign('dish_order-dishes');
            $table  -> dropForeign('dish_order-orders');
        });

        Schema::table('dishes', function (Blueprint $table) {

            $table  -> dropForeign('dishes-user');
        });

        Schema::table('typology_user', function (Blueprint $table) {

            $table  -> dropForeign('typology_user-typology');
            $table  -> dropForeign('typology_user-user');
        });
    }
}
