<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentsController extends Controller
{
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function show($file = '01-welcome.md') {
        $index = \Cache::remember('documents.index',120,function (){
            return mark_down($this->document->get());
        });

        $content = \Cache::remember("documents.{$file}",120,function() use ($file){
            return mark_down($this->document->get($file));
        });

        return view('documents.index',compact('index','content'));
    }
}
