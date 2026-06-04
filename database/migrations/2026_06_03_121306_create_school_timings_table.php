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
        Schema::create('school_timings', function (Blueprint $table) {
            $table->id();

            $table->string('title'); // Nursery to Sr. Kg., I to X, XI to XII (Sci / Comm)

            $table->time('reporting_time')->nullable();

            $table->time('school_start_time');

            $table->time('school_end_time')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_timings');
    }
};