<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeCriteria extends Model
{
    protected $table = "agecriteria";
    protected $fillable = [
        'year',
        'standard',
        'from',
        'to',
    ];
}
