<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeCriteria extends Model
{
    protected $table = "ageCriteria";
    protected $fillable = [
        'year',
        'standard',
        'from',
        'to',
    ];
}
