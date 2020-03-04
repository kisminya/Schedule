<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Programs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('title',50);
            $table->string('start_time',20);
            $table->text('description');
            $table->integer('age_limit');
            $table->unsignedInteger('channel_id');
            $table->unsignedInteger('date_id');
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
        //
    }
}
