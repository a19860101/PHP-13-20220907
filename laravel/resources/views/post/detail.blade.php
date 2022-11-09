@extends('template.master')
@section('main')
<div class="w-[1200px] mx-auto space-y-5 mt-5">
    <div class="w-full">
        <div class="border border-zinc-400 rounded p-5 space-y-3">
            <h3 class="text-4xl font-bold">{{$post->title}}</h3>
            <div>
                {{$post->user->name}}
            </div>
            <div>
                {!!$post->body!!}
            </div>
            <div>
                <a href="/post" class="px-3 py-2 bg-zinc-800 text-white rounded">返回</a>
            </div>
        </div>
    </div>
</div>
@endsection
