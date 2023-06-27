<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('specialization');
            $table->string('short_description');
            $table->longText('description');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_8976011')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
