<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Str;

class BannerController extends Controller
{
    //
    public function index(){
        $banners = Banner::get();
        return view('admin.banner.index',compact('banners'));
    }
    public function store(Request $request){
        if($request->file('img')){
            $ext =$request->file('img')->getClientOriginalExtension();
            $img_name = Str::uuid().'.'.$ext;
            $request->file('img')->storeAs('images',$img_name,'public');
        }else{
            $img_name = null;
        }

        $banner = new Banner;
        $banner->fill($request->all());
        $banner->img = $img_name;
        $banner->save();

        return redirect()->back();
    }
}
