<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table ='item_db';
    protected $fillable =['item','price','category','images','quantity','barcode'];
}
