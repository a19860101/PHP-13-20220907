@extends('admin.template.master')
@section('main')
<div class="p-3 flex">
    <div class="w-1/2 px-5">
        <h2 class="text-3xl bold mb-3">編輯商品分類</h2>
        <form action="/admin/category/{{$category->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="">分類名稱</label>
                <input type="text" name="title" class="border border-zinc-900 w-full p-2 rounded" value="{{$category->title}}">
            </div>
            <div class="mb-3">
                <label for="">分類英文名稱</label>
                <input type="text" name="slug" class="border border-zinc-900 w-full p-2 rounded" value="{{$category->slug}}">
            </div>
            <div class="mb-3">
                <label for="">封面</label>
                @if($category->cover == null)
                <input type="file" name="cover" class="border border-zinc-900 w-full p-2 rounded">
                @else
                <img src="/images/{{$category->cover}}" alt="" class="w-36">
                <a href="/admin/deleteCover/{{$category->id}}"class="bg-rose-900 text-white px-4 py-2">刪除封面</a>
                <input type="hidden" name="cover" value="{{$category->cover}}">
                @endif
            </div>
            <input type="submit" value="更新分類" class="bg-zinc-900 text-white px-8 py-3">
            <input type="button" value="取消"  class="bg-rose-500 text-white px-8 py-3" onclick="history.back()">
        </form>
    </div>

</div>
@endsection
