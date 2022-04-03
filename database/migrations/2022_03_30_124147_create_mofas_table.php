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
        Schema::create('mofas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('police_clearance_id');
            $table->foreign('police_clearance_id')->references('id')->on('entry_passports')->onDelete('cascade');
            $table->string('mofa_date')->nullable();
            $table->string('mofa_report')->nullable();
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
        Schema::dropIfExists('mofas');
    }
};
