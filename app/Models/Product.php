<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['p_name','p_quantity','tp_id','rp_id','p_price','p_size','p_desc','p_img','p_collection' ];

    public $timestamps = true;
    protected $primaryKey = 'p_id';

}
