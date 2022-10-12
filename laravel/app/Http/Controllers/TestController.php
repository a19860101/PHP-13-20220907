<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function qwer($id,$page){
        // return view('hello')->with([
        //     'id' => $id,
        //     'page' => $page
        // ]);
        // return view('hello',[
        //     'id' => $id,
        //     'page' => $page
        // ]);
        return view('hello',compact('id','page'));
    }
    public function form(){
        return view('form');
    }
    public function res(Request $request){
        return $request;
    }
}
