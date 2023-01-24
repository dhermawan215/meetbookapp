<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked', function (Blueprint $table) {
            $table->id();
            $table->string('book_no');
            $table->string('activity');
            $table->string('topic');
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('participants')->nullable();
            $table->string('note')->nullable();
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
        Schema::drop('booked');
    }
}
