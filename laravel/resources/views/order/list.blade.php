@extends('template.master')
@section('main')
<div class="p-4">
    <h3 class="text-4xl font-bold mb-3">我的訂單</h3>
    @foreach($orders as $order)
    <div class="my-4 border border-zinc-500 p-4 rounded">
        <h4 class="text-3xl font-bold mb-3">
            訂單編號 {{$order->orderNo}}
        </h4>
        <a href="/order-detail/{{$order->id}}" class="px-4 py-2 bg-amber-300 rounded">詳細資料</a>
    </div>
    @endforeach
</div>
@endsection
