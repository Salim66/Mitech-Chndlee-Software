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
        Schema::create('entry_passports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('date');
            $table->string('name');
            $table->string('passport_no')->unique();
            $table->string('mobile_no');
            $table->string('visa_type');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('processing_id');
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
        Schema::dropIfExists('entry_passports');
    }
};
