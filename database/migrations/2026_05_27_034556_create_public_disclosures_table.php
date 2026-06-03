<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('public_disclosures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('title_id');

            $table->text('description')->nullable();

            $table->string('pdf');

            $table->string('pdf_name')->nullable();

            $table->foreign('title_id')
                ->references('id')
                ->on('publicdisclosuretitle')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_disclosures');
    }
};
