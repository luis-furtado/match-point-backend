<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_category_id');

            $table->string('title');
            $table->string('attractions');
            $table->string('location');
            $table->dateTime('date');
            $table->double('price', 8, 2)->nullable();
            $table->text('description');
            $table->unsignedBigInteger('tickets_available');

            $table->foreign('event_category_id')->references('id')->on('event_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
