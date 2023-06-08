<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoiningsTable extends Migration
{
    public function up()
    {
        Schema::create('joinings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('gender');
            $table->string('nationality');
            $table->string('qualification');
            $table->integer('experience_years');
            $table->boolean('is_sent_email')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
