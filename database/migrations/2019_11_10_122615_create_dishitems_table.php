<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dish_id');
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->string('image');
            $table->foreign('dish_id')
                  ->references('id')->on('dishes')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishitems');
    }
}
