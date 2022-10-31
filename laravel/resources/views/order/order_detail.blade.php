@extends('template.master')
@section('main')
    <div class="p-4">
        <h2>訂單編號: {{ $order->orderNo }}</h2>
        @foreach ($orderDetails as $od)
            <div>
                <h3>{{ $od->product->title }}</h3>
                <div>
                    @if ($od->product->special_price)
                        <del>{{ $od->product->price }}</del>
                        <span class="text-rose-700 font-bold">{{ $od->product->special_price }}</span>
                    @else
                        <span>{{ $od->product->price }}</span>
                    @endif
                </div>
            </div>
        @endforeach
        <div>
            總金額 : {{ $order->total }}
        </div>
        <a href="#" onclick="history.back()" class="px-2 py-1 bg-zinc-900 text-white">返回</a>
    </div>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-4">
                    <h2 class="text-4xl font-bold text-sky-800">訂單編號: {{ $order->orderNo }}</h2>
                    @foreach ($orderDetails as $od)
                        <div class="border border-zinc-600 rounded p-4">
                            <h3>{{ $od->product->title }}</h3>
                            <div>
                                @if ($od->product->special_price)
                                    <del>{{ $od->product->price }}</del>
                                    <span class="text-rose-700 font-bold">{{ $od->product->special_price }}</span>
                                @else
                                    <span>{{ $od->product->price }}</span>
                                @endif
                            </div>
                        </div>

                    @endforeach
                    <div class="text-3xl font-bold">
                        總金額 : {{ $order->total }}
                    </div>
                    <a href="#" onclick="history.back()" class="inline-block px-3 py-2 bg-zinc-900 text-white rounded">返回</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
