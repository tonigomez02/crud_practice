<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id("player_id");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("name");
            $table->string("lastname");
            $table->string("position");
            $table->date("birthdate");
            $table->string("description")->nullable();
            $table->boolean("retired");
            $table->integer("salary")->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate("cascade")
                ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
