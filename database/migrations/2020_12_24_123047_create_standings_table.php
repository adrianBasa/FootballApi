<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->text('Nr')->nullable();
            $table->text('Team')->nullable();
            $table->text('PG')->nullable();
            $table->text('PTS')->nullable();
            $table->text('W')->nullable();
            $table->text('D')->nullable();
            $table->text('L')->nullable();
            $table->text('GF')->nullable();
            $table->text('GA')->nullable();
            $table->text('LeagueId')->nullable();
            $table->text('Logo')->nullable();
            $table->text('TeamId')->nullable();
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
        Schema::dropIfExists('standings');
    }
}
