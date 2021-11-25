<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorItemPivotTable extends Migration
{
    public function up()
    {
        Schema::create('color_item', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id', 'item_id_fk_5416297')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id', 'color_id_fk_5416297')->references('id')->on('colors')->onDelete('cascade');
        });
    }
}
