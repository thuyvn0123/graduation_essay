<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';

    protected $fillable = ['tt_name','tt_avt','tt_comment' ];

    public $timestamps = true;
    protected $primaryKey = 'tt_id';
}
