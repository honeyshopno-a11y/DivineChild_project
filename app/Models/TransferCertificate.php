<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferCertificate extends Model
{
    protected $table = 'transfer_certificate';

    protected $fillable = [
        'image',
    ];
}
