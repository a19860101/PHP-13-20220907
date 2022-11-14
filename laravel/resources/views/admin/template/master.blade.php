<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QQQ Shop 後台管理介面</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        table,td,th {
            border: 1px solid #999;
            padding: 8px;
        }
    </style>
</head>
<body>
    <nav class="w-[300px] bg-gray-900 fixed h-screen">
        <a href="/admin" class="text-white block p-4">首頁</a>
        <a href="/admin/product/" class="text-white block p-4">商品管理</a>
        <a href="/admin/product/create" class="text-white block p-4">新增商品</a>
        <a href="/admin/category" class="text-white block p-4">商品分類管理</a>
        <a href="/admin/post" class="text-white block p-4">文章管理</a>
        <a href="/admin/banner" class="text-white block p-4">Banner管理</a>
    </nav>
    <div class="pl-[300px]">
        @yield('main')
    </div>
</body>
</html>
