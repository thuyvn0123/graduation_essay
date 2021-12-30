<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $table = 'image_products';

    protected $fillable = ['ip_id','ip_img','p_id' ];

    public $timestamps = true;
    protected $primaryKey = 'ip_id';
}
