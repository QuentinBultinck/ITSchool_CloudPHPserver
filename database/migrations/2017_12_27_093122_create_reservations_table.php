<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments("id");
            $table->date("date");
            $table->integer("people");
            $table->time("time");
            $table->text("extraInfo")->nullable();
            $table->integer("restaurant_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('reservations', function($table) {
            $table->foreign("restaurant_id")->references("id")->on("restaurants")->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reservations');
        Schema::enableForeignKeyConstraints();
    }
}
