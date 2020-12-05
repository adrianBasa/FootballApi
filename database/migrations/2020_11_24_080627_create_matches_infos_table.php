<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_infos', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('embed')->nullable();
            $table->text('url')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('date')->nullable();
            $table->text('cName')->nullable();
            $table->text('cId')->nullable();
            $table->text('cUrl')->nullable();
            $table->text('videoTitle')->nullable();
            $table->text('side1')->nullable();
            $table->text('side2')->nullable();
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
        Schema::dropIfExists('matches_infos');
    }
}
