<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sortieController extends Controller
{
    public function add(){
        return view('sortie.add');
    }

    public function list(){
        return view('sortie.list');
    }
}
