<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_8603012')->references('id')->on('users'); 
            $table->unsignedBigInteger('request_service_id');
            $table->foreign('request_service_id', 'request_service_fk_8602023')->references('id')->on('request_services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
