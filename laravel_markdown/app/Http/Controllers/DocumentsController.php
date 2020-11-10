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

    public function show($file = null) {
        return view('documents.index',[
            'index' => mark_down($this->document->get()),
            'content' => mark_down($this->document->get($file ?:'01-welcome.md'))
        ]);
    }
}
