<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HolidayList extends Model
{
    protected $table = "holidayList";

    protected $fillable = [
        'main_title',
        'holiday',
        'month',
        'day',
        'date',
    ];
}
