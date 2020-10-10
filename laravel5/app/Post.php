<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //악의적인 필드 생성 방지
    protected $fillable = ['title', 'body'];
}
