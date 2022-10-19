<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QQQ Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="w-full bg-zinc-700 text-white flex justify-between px-3 py-4">
        <a href="/product/" class="w-[200px]">QQQ SHOP</a>
        <div class="flex w-full">
            <ul class="flex ml-auto">
                <li><a href="#">所有商品</a></li>
            </ul>
        </div>
    </nav>
    @yield('main')
</body>
</html>
