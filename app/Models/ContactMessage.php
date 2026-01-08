<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_booking',
        'message',
        'status',
        'replied_at',
    ];

    protected $casts = [
        'is_booking' => 'boolean',
        'replied_at' => 'datetime',
    ];
}
