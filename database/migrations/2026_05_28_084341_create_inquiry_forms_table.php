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
        Schema::create('inquiry_forms', function (Blueprint $table) {
            $table->id();
            // BASIC DETAILS
            $table->string('academic_year')->nullable();
            $table->string('class')->nullable();
            $table->string('child_photo')->nullable();

            $table->string('student_name')->nullable();
            $table->string('gender')->nullable();

            $table->string('date_of_birth')->nullable();
            $table->string('age_as_on_31st_may_2026')->nullable();
            $table->string('primary_mobile_no')->nullable();

            $table->string('primary_email_id')->nullable();
            $table->string('current_class')->nullable();

            $table->string('name_of_the_present_school')->nullable();
            $table->string('board')->nullable();
            $table->string('medium')->nullable();

            $table->text('area')->nullable();

            // PARENT DETAILS
            $table->string('family_category')->nullable();
            $table->string('total_family_members')->nullable();

            // FATHER DETAILS
            $table->string('father_photo')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_qualification')->nullable();
            $table->string('father_occupation')->nullable();
           

            // MOTHER DETAILS
            $table->string('mother_photo')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_qualification')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_mobile_no')->nullable();
            

            // SIBLING DETAILS
            $table->string('sibling_name')->nullable();
            $table->string('sibling_age')->nullable();
            $table->string('sibling_class')->nullable();
            $table->string('school')->nullable();

            // ADDITION DETAILS
            $table->string('current_address')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('source_of_information')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_forms');
    }
};
