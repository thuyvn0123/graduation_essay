<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';

    protected $fillable = ['t_name','t_avt','t_info' ];

    public $timestamps = true;
    protected $primaryKey = 't_id';
}
