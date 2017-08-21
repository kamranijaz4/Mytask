<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuesionairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quesionairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('Time'); 
            $table->string('option');
            $table->string('publish'); 
       
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
        Schema::drop('quesionairs');
    }
}
