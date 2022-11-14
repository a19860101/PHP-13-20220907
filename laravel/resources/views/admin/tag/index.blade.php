@extends('admin.template.master')
@section('main')
<div class="p-3">
    <h1 class="text-4xl bold">商品管理</h1>
    <table>
        <tr>
            <tr>
                <th>#</th>
                <th>標籤名稱</th>
                <th>動作</th>
            </tr>
        </tr>
        @foreach($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->title}}</td>
            <td>
                <form action="/admin/tag/{{$tag->id}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="刪除" class="px-2 py-1 bg-red-400 rounded">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
