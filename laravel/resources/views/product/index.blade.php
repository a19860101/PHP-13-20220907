@extends('template.master')
@section('main')
<div class="container flex flex-wrap mx-auto">
    @foreach($products as $product)
    <div class="w-1/4 p-4">
        <div>
            <img src="images/{{$product->cover}}"  class="w-full">
        </div>
        <div>
            <h3>
                <a href="/product/{{$product->id}}">{{$product->title}}</a>
            </h3>
            <div>
                {{$product->price}}
            </div>
            <form action="#" method="post">
                <input type="submit" value="加入購物車" class="bg-sky-500 text-white px-4 py-2 rounded">
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
