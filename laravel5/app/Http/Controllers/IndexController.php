<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        //return view('test');
        $items = array('apple','iphone');
        return view('test',compact('items'));
    }
}
