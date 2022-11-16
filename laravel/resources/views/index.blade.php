@extends('template.master')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
@endsection
@section('main')
    <header>
        @foreach($banners as $banner)
        <div class="aspect-[3/1]">
            <a href="{{$banner->link}}">
                <img src="images/{{$banner->img}}" alt="" class="w-full h-full object-cover">
            </a>
        </div>
        @endforeach
    </header>
    <div class="container flex flex-wrap mx-auto py-[120px]">
        <div class="w-full">
            <h2 class="text-3xl font-bold text-center">特色商品</h2>
        </div>
        @foreach($products as $product)
        <div class="w-1/4 p-4">
            <div class="border border-zinc-400 rounded overflow-hidden">
                <div>
                    <img src="{{asset('20221116/images/'. $product->cover ) }}" class="w-full">
                </div>
                <div class="p-3">
                    <h3>
                        {{-- <a href="/20221116/product/{{ $product->id }}">{{ $product->title }}</a> --}}
                        <a href="{{route('front.product.show',[$product->id])}}">{{ $product->title }}</a>
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
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(function(){
        $('header').slick({
            autoplay: true,
            dots: true,
            arrows:false
        })
    })
</script>
@endsection
