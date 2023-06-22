<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequestServicesTable extends Migration
{
    public function up()
    {
        Schema::table('request_services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8602011')->references('id')->on('users');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_8602012')->references('id')->on('services');
            $table->unsignedBigInteger('consultant_id')->nullable();
            $table->foreign('consultant_id', 'consultant_fk_8794012')->references('id')->on('users');
        });
    }
}
