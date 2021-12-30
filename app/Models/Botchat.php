<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botchat extends Model
{
    use HasFactory;
    protected $table = 'botchats';

    protected $fillable = ['bot_id','bot_name','bot_room','bot_phone','bot_status'];

    public $timestamps = true;
    protected $primaryKey = 'bot_id';
}
