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
        Schema::create('test_medicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('entry_passport_id');
            $table->foreign('entry_passport_id')->references('id')->on('entry_passports')->onDelete('cascade');
            $table->string('medical_attend_date')->nullable();
            $table->string('report_delivery_date')->nullable();
            $table->string('medical_report_status')->nullable();
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
        Schema::dropIfExists('test_medicals');
    }
};
