<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';

    protected $fillable = ['b_id','b_method','id','b_total','b_status','b_address','b_name','b_email','b_phone','b_company' ];

    public $timestamps = true;
    protected $primaryKey = 'b_id';
    protected $keyType = 'string';
    public $incrementing = false;
}
