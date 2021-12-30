<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'devvn_xaphuongthitran';

    protected $fillable = ['xaid','name','type', 'maqh' ];

    protected $primaryKey = 'xaid';
}
