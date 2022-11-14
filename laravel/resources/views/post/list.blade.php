@extends('template.master')
@section('main')
<div class="w-[1200px] mx-auto space-y-5 mt-5">
    @foreach($posts as $post)
    <div class="w-full">
        <div class="border border-zinc-400 rounded p-5 space-y-3">
            <h3 class="text-4xl font-bold">{{$post->title}}</h3>
            <div>{{$post->user->name}}</div>
            <hr>
            <div>
                @php
                  $tagArray = [];
                    foreach($post->tags as $tag){
                        $tagArray[] = $tag->title;
                    }
                    $tagStr = implode(',',$tagArray);
                @endphp
                {{$tagStr}}
            </div>
            <div>
                {{Str::limit(strip_tags($post->body),200)}}
            </div>
            <div>
                <a href="/post/{{$post->id}}" class="px-3 py-2 bg-sky-400 rounded">繼續閱讀</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
