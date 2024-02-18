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
        Schema::create('stms_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('major')->nullable(false);
            $table->string('password')->nullable(false);
            $table->integer('role')->nullable(false)->default(1);
            $table->integer('activation')->nullable(false)->default(1);
            $table->unsignedBigInteger('company_id')->nullable()->unsigned();
            $table->rememberToken('remember_token');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('training_institutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tms_users');
    }
};
