<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarqueeBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marquee_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('marquee_id');
            $table->foreign('marquee_id')
                ->references('id')
                ->on('marquees')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('contact_no');
            $table->integer('guests');
            $table->date('reserve_date');

            $table->unsignedInteger('menu_id');
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')->onDelete('cascade');

            $table->string('function_type');
            $table->string('function_time');
            $table->text('message');
            $table->string('status');
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
        Schema::dropIfExists('marquee_bookings');
    }
}
