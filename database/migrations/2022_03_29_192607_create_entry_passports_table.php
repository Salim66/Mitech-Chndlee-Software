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
            $table->string('date');
            $table->string('name');
            $table->string('passport_no');
            $table->string('mobile_no');
            $table->string('visa_type');
            $table->string('reference');
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
