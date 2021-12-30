<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = ['n_id','n_thumbnail','n_desc','n_content','n_author','n_title', 'updateed_at' ];

    public $timestamps = true;
    protected $primaryKey = 'n_id';
}
