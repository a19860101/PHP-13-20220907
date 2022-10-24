@extends('template.master')
@section('main')
<div class="p-4">
    <div class="container flex">
        <h2>購物車</h2>

        @foreach($carts as $cart)
        <div>{{$cart->product_id}}</div>
        @endforeach
    </div>
</div>
@endsection
