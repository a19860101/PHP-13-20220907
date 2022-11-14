@extends('admin.template.master')
@section('main')
<div class="p-3">
    <h1 class="text-4xl bold">文章管理</h1>
    <h2 class="text-3xl bold my-4">所有文章</h2>
    <table>
        <tr>
            <tr>
                <th>#</th>
                <th>文章標題</th>
                <th>作者</th>
                <th>發布日期</th>
                <th>上/下架</th>
                <th>動作</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->publish_at}}</td>
                <td>{{$post->published}}</td>
                <td>
                    <a href="/admin/post/{{$post->id}}" class="px-3 py-2 bg-sky-600 rounded">檢視</a>
                    <form action="/admin/post/{{$post->id}}" method="post" class="inline-block">
                        @csrf
                        @method('delete')
                        <input type="submit" value="刪除" class="px-3 py-2 bg-red-600 rounded">
                    </form>
                </td>
            </tr>
            @endforeach
        </tr>

    </table>
    <h2 class="text-3xl bold my-4">已刪除文章</h2>
    <table>
        <tr>
            <tr>
                <th>#</th>
                <th>文章標題</th>
                <th>作者</th>
                <th>動作</th>
            </tr>
            @foreach($posts_trashed as $post_trashed)
            <tr>
                <td>{{$post_trashed->id}}</td>
                <td>{{$post_trashed->title}}</td>
                <td>{{$post_trashed->user->name}}</td>
                <td>

                </td>
            </tr>
            @endforeach
        </tr>

    </table>
</div>
@endsection
