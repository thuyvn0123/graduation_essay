<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProject extends Model
{
    use HasFactory;
    protected $table = 'image_projects';

    protected $fillable = ['ipr_id','ipr_img','pr_id' ];

    public $timestamps = true;
    protected $primaryKey = 'ipr_id';
}
