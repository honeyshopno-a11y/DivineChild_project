<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable = [
        'category_id',
        'document_name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
