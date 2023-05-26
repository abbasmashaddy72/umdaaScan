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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locality_id')->constrained('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->enum('gender', ['Male', 'FeMale', 'Trans']);
            $table->string('contact_no')->nullable();
            $table->string('qualification');
            $table->string('registration_no')->nullable();
            $table->string('department')->nullable();
            $table->string('registration_fee')->nullable();
            $table->string('consultation_fee')->nullable();
            $table->string('review_link')->nullable();
            $table->longText('about')->nullable();
            $table->string('career_start_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
