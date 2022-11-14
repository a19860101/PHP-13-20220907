<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;
use Str;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
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

        $post = new Post;
        $post->fill($request->all());
        $post->cover = $img_name;
        $post->user_id = Auth::id();
        $post->save();

        //標籤
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel->id);
        }

        return redirect('/user/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        if($request->file('cover')){
            $ext =$request->file('cover')->getClientOriginalExtension();
            $img_name = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$img_name,'public');
        }else{
            $img_name = $request->cover;
        }

        $post->fill($request->all());
        $post->cover = $img_name;
        $post->save();

        //標籤
        $post->tags()->detach();
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel->id);
        }

        return redirect('/user/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        Storage::disk('public')->delete('/images/'.$post->cover);
        $post->delete();

        return redirect('/user/post');

    }
    public function deleteCover($id){
        $post = Post::find($id);

        Storage::disk('public')->delete('/images/'.$post->cover);

        $post->cover = null;
        $post->save();


        return redirect()->back();
    }
    public function front_index(){
        $posts = Post::showAll()->orderBy('id','DESC')->get();
        return view('post.list',compact('posts'));
    }
    public function front_show(Post $post){
        return view('post.detail',compact('post'));
    }
}
