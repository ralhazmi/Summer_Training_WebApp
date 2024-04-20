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
        $table->unsignedBigInteger('user_id')->nullable();
        $table->unsignedBigInteger('userTo')->nullable(false);
        $table->string('report_title')->nullable(false);
        $table->timestamps();
        $table->binary('attachment');
        $table->date('date');
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('userTo')->references('id')->on('users');
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
