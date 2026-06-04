<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    protected $table = "awards";
    protected $fillable = [
        'image',
        'title',
        'date',
    ];
}
