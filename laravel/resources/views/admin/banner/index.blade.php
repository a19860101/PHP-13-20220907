@extends('admin.template.master')
@section('main')
<div class="p-3">
    <h2 class="text-4xl bold mb-5">新增Banner</h2>
    <form action="/admin/banner" method="post" enctype="multipart/form-data">
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

    <h2 class="text-3xl font-bold">Banner列表</h2>
    <div class='w-[800px]'>
        <table class="w-full">
            <tr>
                <th>#</th>
                <th>標題</th>
                <th>連結</th>
                <th>縮圖</th>
                <th>動作</th>
            </tr>
            @foreach($banners as $banner)
            <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->title}}</td>
                <td>{{$banner->link}}</td>
                <td>
                    <img src="/images/{{$banner->img}}" alt="" class="w-32">
                </td>
                <td>
                    <form action="">
                        <input type="submit" value="刪除">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
