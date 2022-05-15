<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->dateTime('date')->nullable();

            $table->string('note')->nullable();

            $table->text('start_url')->nullable();
            $table->text('join_url')->nullable();

            // $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_id');
            $table->string('reservation_status')->default('false')->nullable();

            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
