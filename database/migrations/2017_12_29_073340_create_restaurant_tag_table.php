<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_tag', function (Blueprint $table) {
            $table->integer('restaurant_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(["restaurant_id", "tag_id"]);
        });

        Schema::table('restaurant_tag', function (Blueprint $table) {
            $table->foreign("restaurant_id")->references("id")->on("restaurants")->onDelete('cascade');
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('restaurant_tag');
    }
}
