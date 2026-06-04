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
        Schema::create('pre_board_dates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('ex. PRE-BOARD 1');
            $table->date('from_date')->nullable()->comment('From Date');
            $table->date('to_date')->nullable()->comment('To Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_board_dates');
    }
};
