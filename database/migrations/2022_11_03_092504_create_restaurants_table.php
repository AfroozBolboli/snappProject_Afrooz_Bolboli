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
            $table->bigInteger('accountNumber');
            $table->string('restaurantPicture')->nullable();
            $table->float('shippingCost')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->boolean('status')->default(0); //if the shop is entirely closed or opem
            $table->string('categories');
            // $table->string('workingDay');
            // $table->time('openingTime');
            // $table->time('closingTime');
            // $table->boolean('isOpen')->default(0);// 0 is closed now. 1 is open now.
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
