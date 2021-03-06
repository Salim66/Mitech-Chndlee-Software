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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('type')->nullable();
            $table->integer('users')->nullable();
            $table->integer('entery_passport')->nullable();
            $table->integer('test_medical')->nullable();
            $table->integer('final_medical')->nullable();
            $table->integer('police_clearance')->nullable();
            $table->integer('mofa')->nullable();
            $table->integer('visa')->nullable();
            $table->integer('traning_certificate')->nullable();
            $table->integer('man_power')->nullable();
            $table->integer('flight')->nullable();
            $table->integer('final_state')->nullable();
            $table->integer('accounts')->nullable();
            $table->integer('agent')->nullable();
            $table->integer('country')->nullable();
            $table->integer('processing_media')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
