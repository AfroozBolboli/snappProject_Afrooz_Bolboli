<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodparties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('food_id');
            $table->integer('discount');
            $table->string('time');
            $table->date('date');
            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
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
        Schema::dropIfExists('foodparties');
    }
};
