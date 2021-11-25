<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSpecialForPivotTable extends Migration
{
    public function up()
    {
        Schema::create('item_special_for', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id', 'item_id_fk_5416298')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('special_for_id');
            $table->foreign('special_for_id', 'special_for_id_fk_5416298')->references('id')->on('special_fors')->onDelete('cascade');
        });
    }
}
