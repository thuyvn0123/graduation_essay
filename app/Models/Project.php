<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = ['pr_id','pr_thumbnail','pr_desc','pr_location','pr_title','pr_brand','pr_style' ];

    public $timestamps = true;
    protected $primaryKey = 'pr_id';
}
