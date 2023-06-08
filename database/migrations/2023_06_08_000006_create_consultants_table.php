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
            $table->string('name');
            $table->string('short_description');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
