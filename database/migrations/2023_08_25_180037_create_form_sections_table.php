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
        Schema::create('form_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('form_section_name')->nullable();
            $table->longText('fields')->nullable();
            $table->string('form_has_file')->nullable();
            $table->text('file_name')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_8921810')->references('id')->on('services');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_sections');
    }
};
