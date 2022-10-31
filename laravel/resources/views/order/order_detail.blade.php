@extends('template.master')
@section('main')
<div class="p-4">
    <h2>訂單編號: {{$order->orderNo}}</h2>
    @foreach($orderDetails as $od)
        <div>
            <h3>{{$od->product->title}}</h3>
            <div>
                @if($od->product->special_price)
                <del>{{$od->product->price}}</del>
                <span class="text-rose-700 font-bold">{{$od->product->special_price}}</span>
                @else
                <span>{{$od->product->price}}</span>
                @endif
            </div>
        </div>
    @endforeach
    <div>
        總金額 : {{$order->total}}
    </div>
    <a href="#" onclick="history.back()" class="px-2 py-1 bg-zinc-900 text-white">返回</a>
</div>
@endsection
