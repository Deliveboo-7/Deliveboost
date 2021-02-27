<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table -> id();

            $table -> string('code', 6) -> unique();
            $table -> string('customer_name', 100);
            $table -> string('customer_address', 200);
            $table -> string('customer_phone', 200);
            $table -> date('date');
            $table -> string('status');
            $table -> integer('total_price');

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
        Schema::dropIfExists('orders');
    }
}
