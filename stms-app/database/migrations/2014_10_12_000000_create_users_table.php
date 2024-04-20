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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('major')->nullable(false);
            $table->integer('hours')->nullable();
            $table->string('password')->nullable(false);
            $table->integer('role')->nullable(false)->default(1);
            $table->integer('activation')->nullable(false)->default(1);
            $table->string('company')->nullable(false)->default("Unkown");
            $table->binary('attachment')->nullable();
            $table->rememberToken('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
