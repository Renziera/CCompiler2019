<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_id')->unsigned();
            $table->foreign('proposal_id')->references('id')->on('proposals');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedTinyInteger('kriteria_1')->nullable(true);
            $table->unsignedTinyInteger('kriteria_2')->nullable(true);
            $table->unsignedTinyInteger('kriteria_3')->nullable(true);
            $table->unsignedTinyInteger('kriteria_4')->nullable(true);
            $table->unsignedTinyInteger('kriteria_5')->nullable(true);
            $table->unsignedTinyInteger('total')->nullable(true);
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
        Schema::dropIfExists('reviews');
    }
}
