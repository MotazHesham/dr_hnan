<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_8599172')->references('id')->on('services');
        });
    }
}
