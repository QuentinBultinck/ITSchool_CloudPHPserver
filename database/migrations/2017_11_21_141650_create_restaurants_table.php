<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
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
            $table->string("name")->unique();
            $table->text("info")->nullable();
            $table->time("openingTime");
            $table->time("closingTime");
            $table->string("city");
            $table->string("country");
            $table->string("street");
            $table->integer("houseNumber");
            $table->integer("tables");
            $table->integer("owner_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('restaurants', function($table) {
            $table->foreign("owner_id")->references("id")->on("users")->onDelete('cascade');
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
}
