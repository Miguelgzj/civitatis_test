<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActividadesAndReservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64);
            $table->string('description', 300);
            $table->date('start_at');
            $table->date('finish_at');
            $table->decimal('price');
            $table->integer('popularity');
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activity_id');
            $table->tinyInteger('number_of_users');
            $table->decimal('booking_price');
            $table->date('start_date');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('activities');
    }
}
