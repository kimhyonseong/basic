<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // 엘로퀀트는 모든 모델이 updated_at과 created_at 필드가 있다고 가정
    // 새로운 Instance가 생성될 때 현재의 timestamp값을 입력하려하기 때문
    protected $fillable = ['title', 'body','name'];
    public $timestamps = false;    //타임스탬프를 사용하지 않음
}
