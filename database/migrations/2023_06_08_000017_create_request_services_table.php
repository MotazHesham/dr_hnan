<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestServicesTable extends Migration
{
    public function up()
    {
        Schema::create('request_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('contract_accept')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
