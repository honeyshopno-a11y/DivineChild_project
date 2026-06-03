<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicDisclosure extends Model
{
    protected $fillable = [
        'title_id',
        'description',
        'pdf',
    ];

    public function title()
    {
        return $this->belongsTo(PublicDisclosureTitle::class, 'title_id');
    }
}
