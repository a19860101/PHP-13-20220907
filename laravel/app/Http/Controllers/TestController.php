<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function qwer(){
        return 'hello qwer';
    }
    public function hello(){
        return view('hello');
    }
}
