<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('cart_user', function (Blueprint $table) {
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id', 'cart_id_fk_5416308')->references('id')->on('carts')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_5416308')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
