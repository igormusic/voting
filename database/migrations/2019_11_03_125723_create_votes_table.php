<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('from_person')->unsigned();
            $table->bigInteger('to_person')->unsigned();
            $table->integer('number_of_votes');
            $table->string('notes');
            $table->boolean('is_anonymous');

            $table->foreign('from_person')->references('id')->on('people');
            $table->foreign('to_person')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
