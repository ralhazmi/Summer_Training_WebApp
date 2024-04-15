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
        Schema::create('reports', function (Blueprint $table) {
        $table->id(); // This will create a big integer column for 'id'
        $table->unsignedBigInteger('user_id')->nullable(); // Use unsignedBigInteger to match the 'id' column in 'users'
        $table->string('report_title')->nullable(false);
        $table->unsignedBigInteger('assign_to')->nullable();
        $table->timestamps();
        $table->binary('attachment');
        $table->date('date');
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('assign_to')->references('id')->on('users')->where('role', '=', 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
