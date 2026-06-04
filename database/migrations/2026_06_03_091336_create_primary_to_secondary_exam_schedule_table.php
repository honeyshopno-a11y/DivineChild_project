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
        Schema::create('primary_to_secondary_exam_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name')->nullable()->comment('Name of Exam');
            $table->date('exam_from_date')->nullable()->comment('Exam From Date');
            $table->date('exam_to_date')->nullable()->comment('Exam To Date');
            $table->date('ptm_date')->nullable()->comment('PTM Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primary_to_secondary_exam_schedule');
    }
};
