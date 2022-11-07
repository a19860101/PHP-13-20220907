<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Str;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if($request->file('cover')){
            $ext =$request->file('cover')->getClientOriginalExtension();
            $img_name = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$img_name,'public');
        }else{
            $img_name = null;
        }

        // Category::create($request->all());
        $category = new Category;
        $category->fill($request->all());
        $category->cover = $img_name;
        $category->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        if($request->file('cover')){
            $ext =$request->file('cover')->getClientOriginalExtension();
            $img_name = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$img_name,'public');
        }else{
            $img_name = $request->cover;
        }

        // Category::create($request->all());
        $category->fill($request->all());
        $category->cover = $img_name;
        $category->save();

        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        // return $category;
        $category->delete();
        return redirect()->back();
    }
    public function deleteCover($id){
        $category = Category::find($id);

        Storage::disk('public')->delete('/images/'.$category->cover);

        $category->cover = null;
        $category->save();


        return redirect()->back();
    }
}
