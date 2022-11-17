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
        Schema::create('restaurant_working_times', function (Blueprint $table) {
            $table->increments('id');

            $table->time('saturdayStart')->nullable();
            $table->time('saturdayEnd')->nullable();
            $table->time('sundayStart')->nullable();
            $table->time('sundayEnd')->nullable();
            $table->time('mondayStart')->nullable();
            $table->time('mondayEnd')->nullable();
            $table->time('tuesdayStart')->nullable();
            $table->time('tuesdayEnd')->nullable();
            $table->time('wednesdayStart')->nullable();
            $table->time('wednesdayEnd')->nullable();
            $table->time('thursdayStart')->nullable();
            $table->time('thursdayEnd')->nullable();
            $table->time('fridayStart')->nullable();
            $table->time('fridayEnd')->nullable();
            
            $table->unsignedInteger('restaurant_id');
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('restaurant_working_times');
    }
};
