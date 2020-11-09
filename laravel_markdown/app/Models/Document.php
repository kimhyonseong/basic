<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Document //extends Model
{
    use HasFactory;

    private $directory = 'docs';

    public function get($file = null) {
        $file = is_null($file) ? 'index.md' : $file;

        if (! File::exists($this->getPath($file))) {
            //헬퍼 함수
            abort(404, 'File not exist');
        }

        return File::get($this->getPath($file));
    }

    private function getPath($file){
        //절대 경로 반환 헬퍼
        return base_path($this->directory . DIRECTORY_SEPARATOR  . $file);
    }
}
