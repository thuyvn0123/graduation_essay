<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_details';

    protected $fillable = ['b_id','bd_name','p_id','bd_quantity','bd_price','bd_img'];

    public $timestamps = true;
    protected $primaryKey = 'bd_id';
}
