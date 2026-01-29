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
        Schema::create('semester_student_bridge', function (Blueprint $table) {
            $table->id();
            // Point to student table
            $table->foreignId('student_id')->constrained('student')->onDelete('cascade');
            // Point to semester table
            $table->foreignId('semester_id')->constrained('semester')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_student_bridge');
    }
};
