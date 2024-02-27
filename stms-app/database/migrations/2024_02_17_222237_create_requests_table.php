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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('email')->nullable(false);
            $table->integer('request_status')->default(1);
            $table->string('request_title')->nullable(false);
            $table->text('content')->nullable(false);
            $table->binary('attachment');
            $table->timestamps(); // This will create created_at and updated_at columns
            $table->date('date'); // Adding a separate date column
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
