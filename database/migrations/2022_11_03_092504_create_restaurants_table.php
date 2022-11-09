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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('phone')->nullable();
            $table->longText('address');
            $table->integer('accountNumber');
            $table->string('categories');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('restaurantPicture')->nullable();
            $table->float('shippingCost')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->boolean('status')->default(0); //if the shop is entirely closed or opem
            $table->string('workingDay')->nullable();
            $table->time('openingTime')->nullable();
            $table->time('closingTime')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
};
