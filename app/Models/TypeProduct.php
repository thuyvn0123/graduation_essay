<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'type_products';

    protected $fillable = ['tp_name','rp_id' ];

    public $timestamps = true;
    protected $primaryKey = 'tp_id';

}
