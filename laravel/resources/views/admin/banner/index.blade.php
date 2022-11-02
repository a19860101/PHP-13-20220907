@extends('admin.template.master')
@section('main')
<div class="p-3">
    <h1 class="text-4xl bold mb-5">建立商品</h1>
    <form action="/admin/product" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="">Banner標題</label>
            <input type="text" name="title" class="border border-zinc-900">
        </div>
        <div class="mb-4">
            <label for="">Banner 連結</label>
            <input type="text" name="link" class="border border-zinc-900">
        </div>
        <div class="mb-4">
            <label for="">Banner圖片</label>
            <input type="file" name="img">
        </div>


        <input type="submit" value="新增Banner" class="bg-zinc-900 text-white px-8 py-3">
    </form>
</div>
@endsection
