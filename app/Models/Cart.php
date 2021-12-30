<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $fillable = ['c_id','p_id','id','c_quantity','c_price' ];

    public $timestamps = true;
    protected $primaryKey = 'ipr_id';
}
