<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUssTable extends Migration
{
    public function up()
    {
        Schema::create('about_uss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('vision')->nullable();
            $table->longText('message')->nullable();
            $table->string('morals')->nullable();
            $table->longText('manager_word')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('address')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
