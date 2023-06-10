<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('the_company');
            $table->string('name');
            $table->string('position');
            $table->string('phone_number');
            $table->string('email');
            $table->boolean('is_sent_email')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
