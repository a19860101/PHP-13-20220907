@extends('template.master')
@section('main')
<div class="p-4">
    <div class="container mx-auto flex">
        <div class="w-1/2 p-5">
            <img src="/images/{{$product->cover}}" alt="" class="w-full">
        </div>
        <div class="w-1/2 p-5">
            <h3 class="text-4xl">{{$product->title}}</h3>
            <div>
                {{$product->description}}
            </div>
            <form action="#" method="post">
                <input type="submit" value="加入購物車" class="bg-sky-500 text-white px-4 py-2 rounded">
            </form>
        </div>
    </div>
</div>
@endsection
