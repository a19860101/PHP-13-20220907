@extends('admin.template.master')
@section('main')
<div class="p-3">
    <div>
        <h2 class="text-4xl font-bold">{{$post->title}}</h2>
        <div>
            {!!$post->body!!}
        </div>
    </div>
</div>
@endsection
