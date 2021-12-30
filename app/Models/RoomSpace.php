<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSpace extends Model
{
    use HasFactory;
    protected $table = 'room_space';

    protected $fillable = ['rp_id','rp_name', ];

    public $timestamps = true;
    protected $primaryKey = 'rp_id';

}
