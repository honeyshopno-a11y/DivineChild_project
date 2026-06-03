<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InquiryForm extends Model
{
    protected $fillable = [

        'academic_year',
        'class',
        'child_photo',
        'student_name',
        'gender',
        'date_of_birth',
        'age_as_on_31st_may_2026',
        'primary_mobile_no',
        'primary_email_id',
        'current_class',
        'name_of_the_present_school',
        'board',
        'medium',
        'area',

        'family_category',
        'total_family_members',

        'father_photo',
        'father_name',
        'father_qualification',
        'father_occupation',

        'mother_photo',
        'mother_name',
        'mother_qualification',
        'mother_occupation',
        'mother_mobile_no',

        'sibling_name',
        'sibling_age',
        'sibling_class',
        'school',

        'current_address',
        'medical_history',
        'source_of_information',
    ];
}
