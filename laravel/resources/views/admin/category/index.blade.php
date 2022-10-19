@extends('admin.template.master')
@section('main')
<div class="p-3 flex">
    <div class="w-1/2 px-5">
        <h2 class="text-3xl bold mb-3">新增商品分類</h2>
        <form action="/admin/category" method="post">
            @csrf
            <div class="mb-3">
                <label for="">分類名稱</label>
                <input type="text" name="title" class="border border-zinc-900 w-full p-2 rounded">
            </div>
            <input type="submit" value="新增分類" class="bg-zinc-900 text-white px-8 py-3">
        </form>
    </div>
    <div class="w-1/2 px-5">
        <h2 class="text-3xl bold mb-3">所有商品分類</h2>
        <ul>
            @foreach($categories as $category)
            <li class="border border-zinc-900 px-5 py-3">{{$category->title}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
