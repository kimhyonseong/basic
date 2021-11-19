<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catchPoke extends Model
{
    use HasFactory;

    protected $table = 'catch_pokes';
    protected $fillable = [
        'user_num',
        'poke_num',
        'nickname',
        'height',
        'weight',
        'favorites',
        'sort',
        'created_at',
        'updated_at',
    ];
}
