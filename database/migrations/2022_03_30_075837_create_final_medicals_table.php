<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_medicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_medical_id');
            $table->foreign('test_medical_id')->references('id')->on('entry_passports')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('medical_attend_date');
            $table->string('report_delivery_date');
            $table->string('medical_report_status');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_medicals');
    }
};
