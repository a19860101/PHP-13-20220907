@extends('template.master')
@section('main')
    <header>
        <img src="https://picsum.photos/id/29/1600/800" alt="" class="w-full">
    </header>
    <div class="container flex flex-wrap mx-auto py-[120px]">
        <div class="w-full">
            <h2 class="text-3xl font-bold text-center">特色商品</h2>
        </div>
        @foreach($products as $product)
        <div class="w-1/4 p-4">
            <div class="border border-zinc-400 rounded overflow-hidden">
                <div>
                    <img src="/images/{{ $product->cover }}" class="w-full">
                </div>
                <div class="p-3">
                    <h3>
                        <a href="/product/{{ $product->id }}">{{ $product->title }}</a>
                    </h3>
                    <div>
                        @if ($product->special_price)
                            <del>{{ $product->price }}</del>
                            <span class="text-rose-700 font-bold">{{ $product->special_price }}</span>
                        @else
                            <span>{{ $product->price }}</span>
                        @endif
                    </div>
                    <form action="/cart" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="submit" value="加入購物車" class="bg-sky-500 text-white px-4 py-2 rounded">
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    <section class="bg-slate-200">
        <div class="container flex flex-wrap mx-auto py-[120px]">
            <div class="w-full">
                <h2 class="text-3xl font-bold text-center">最新商品</h2>
            </div>
            @foreach($new_products as $product)
            <div class="w-1/4 p-4">
                <div class="border border-zinc-400 rounded overflow-hidden">
                    <div>
                        <img src="/images/{{ $product->cover }}" class="w-full">
                    </div>
                    <div class="p-3">
                        <h3>
                            <a href="/product/{{ $product->id }}">{{ $product->title }}</a>
                        </h3>
                        <div>
                            @if ($product->special_price)
                                <del>{{ $product->price }}</del>
                                <span class="text-rose-700 font-bold">{{ $product->special_price }}</span>
                            @else
                                <span>{{ $product->price }}</span>
                            @endif
                        </div>
                        <form action="/cart" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="submit" value="加入購物車" class="bg-sky-500 text-white px-4 py-2 rounded">
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
