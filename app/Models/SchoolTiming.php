<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolTiming extends Model
{
    protected $fillable = [
        'title',
        'reporting_time',
        'school_start_time',
        'school_end_time',
    ];
}