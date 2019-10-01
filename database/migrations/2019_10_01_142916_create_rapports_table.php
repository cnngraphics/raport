<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * Placements (Printed Electronics)
         * Video Showings
         * Hours
         * Return Visits
         * Number of Different Bible Studies Conducted
         * 
         */
        Schema::create('rapports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); //foreign key
            $table->timestamps();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->integer('Placements')->nullable();
            $table->integer('Videos')->nullable();
            $table->integer('Hours')->nullable();
            $table->integer('Visits')->nullable();
            $table->integer('Studies')->nullable();
            $table->string('Comments')->nullable();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapports');
    }
}
