<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');

            $table->string('team_name');
            $table->string('member_1_name');
            $table->string('member_2_name');
            $table->string('member_3_name');
            $table->string('member_4_name')->nullable();
            $table->string('email');
            $table->string('contact');
            $table->string('address');

            $table->string('film_name');
            $table->string('nationality');
            $table->string('occupation');
                    
            $table->integer('total');
            $table->integer('paid');
            $table->string('selected');
            $table->string('submission');
            $table->string('pdf');

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
        Schema::dropIfExists('films');
    }
}
