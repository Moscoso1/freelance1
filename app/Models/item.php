<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
   protected $table = 'sessions';

    protected $fillable = [
        'id', 'payload', 'last_activity', 'user_id', 'ip_address', 'user_agent', 'item', 'price', 'category', 'quantity', 'images', 'barcode'
    ];

    public $timestamps = false; // If you're managing timestamps manually
}
