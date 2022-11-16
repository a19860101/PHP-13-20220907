<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QQQ Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('css')
</head>
<body>
    <nav class="w-full bg-zinc-700 text-white flex justify-between px-3 py-4">
        <a href="{{route('index')}}" class="w-[120px]">QQQ SHOP</a>
        <div class="flex w-full">
            <ul class="flex space-x-4">
                <li><a href="post">部落格</a></li>
                <li><a href="product">所有商品</a></li>
                <?php
                    $categories = \App\Models\Category::get();
                ?>
                @foreach($categories as $cate)
                <li><a href="/20221116/product/category/{{$cate->slug}}">{{$cate->title}}</a></li>
                @endforeach
            </ul>
            <ul class="ml-auto flex">
                <li class="mr-4">
                    <a href="cart">購物車</a>
                </li>
                <li>
                    @auth
                    <a href="{{ url('20221116/dashboard') }}">{{Auth::user()->name;}}</a>
                    @else
                    {{-- <a href="{{ route('login') }}">Log in</a> --}}
                    <a href="/20221116/public/login">Log in</a>

                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}" class="ml-4">Register</a> --}}
                        <a href="/20221116/public/register" class="ml-4">Register</a>
                    @endif
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
    @yield('main')
    @yield('script')
</body>
</html>
