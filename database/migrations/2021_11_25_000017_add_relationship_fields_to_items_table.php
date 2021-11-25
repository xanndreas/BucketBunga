<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_5416296')->references('id')->on('categories');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_5416299')->references('id')->on('locations');
        });
    }
}
