<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_info', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('embed');
            $table->text('url');
            $table->text('thumbnail');
            $table->text('date');
            $table->text('cName');
            $table->text('cId');
            $table->text('Curl');
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
        Schema::dropIfExists('matches_info');
    }
}
