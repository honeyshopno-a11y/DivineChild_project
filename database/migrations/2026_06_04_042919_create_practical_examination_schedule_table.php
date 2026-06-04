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
        Schema::create('practical_examination_schedule', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('ex. Science, Commerce');
            $table->date('from_date')->nullable()->comment('Exam From Date');
            $table->date('to_date')->nullable()->comment('Exam To Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practical_examination_schedule');
    }
};
