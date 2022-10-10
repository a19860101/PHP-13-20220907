<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function qwer($id){
        return view('hello')->with(['id' => $id]);
    }
}
