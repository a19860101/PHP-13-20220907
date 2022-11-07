@extends('template.master')
@section('main')
<div class="w-[1200px] flex flex-wrap mx-auto">
    @foreach($products as $product)
    <div class="w-1/4 p-4">
        <div>
            <img src="/images/{{$product->cover}}"  class="w-full">
        </div>
        <div>
            <h3>
                <a href="/product/{{$product->id}}">{{$product->title}}</a>
            </h3>
            <div>
                @if($product->special_price)
                <del>{{$product->price}}</del>
                <span class="text-rose-700 font-bold">{{$product->special_price}}</span>
                @else
                <span>{{$product->price}}</span>
                @endif
            </div>
            <form action="/cart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="submit" value="加入購物車" class="bg-sky-500 text-white px-4 py-2 rounded">
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
