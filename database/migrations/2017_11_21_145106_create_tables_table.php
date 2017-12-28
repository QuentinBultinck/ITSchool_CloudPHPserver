<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("restaurant_id")->unsigned();
            $table->integer("seats");
            $table->timestamps();
        });

        Schema::table('tables', function($table) {
            $table->foreign("restaurant_id")->references("id")->on("restaurants")->onDelete('cascade');
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
        Schema::dropIfExists('tables');
        Schema::enableForeignKeyConstraints();
    }
}
