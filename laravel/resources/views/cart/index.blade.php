@extends('template.master')
@section('main')
<div class="p-4">
    <div class="container">
        <h2 class="text-4xl font-bold">購物車</h2>
        <hr>
        @foreach($carts as $cart)
        <div class="my-4 border border-zinc-500 p-4 rounded">
            <h4 class="text-3xl font-bold">
                {{$cart->product->title}}
            </h4>
            <div>
                @if($cart->product->special_price)
                <del>{{$cart->product->price}}</del>
                <span class="text-rose-700 font-bold">{{$cart->product->special_price}}</span>
                @else
                <span>{{$cart->product->price}}</span>
                @endif
            </div>
            <form action="/cart/{{$cart->id}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="移除" class="px-6 py-2 bg-rose-600" onclick="return confirm('確認刪除？')">
            </form>
        </div>
        @endforeach


        @if(count($carts) != 0)
        <div class="my-4">
            總金額{{$total}}
            <hr>
        </div>
        <form action="/cart/empty" method="post">
            @csrf
            <input type="submit" value="清空購物車" class="px-6 py-2 border border-rose-600" onclick="return confirm('確認刪除？')">
        </form>
        @else
        <div>購物車是空的喔!</div>
        @endif

        <form action="/checkout" method="post">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <input type="submit" value="結帳" class="px-6 py-2 border border-sky-600" >
        </form>

    </div>
</div>
@endsection
