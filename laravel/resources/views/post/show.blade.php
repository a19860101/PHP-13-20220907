

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-4xl font-bold mb-3">編輯</h3>
                    <form action="/user/post/{{$post->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-4">
                            <label for="">名稱</label>
                            <input type="text" name="title" class="border border-zinc-400 rounded w-full" value="{{$post->title}}">
                        </div>

                        <div class="mb-4">
                            <label for="">封面</label>
                                @if($post->cover == null)
                                <input type="file" name="cover" class="border border-zinc-900 w-full p-2 rounded">
                                @else
                                <img src="/images/{{$post->cover}}" alt="" class="w-36">
                                <a href="/user/post/deleteCover/{{$post->id}}"class="bg-rose-900 text-white px-4 py-2">刪除封面</a>
                                <input type="hidden" name="cover" value="{{$post->cover}}">
                                @endif
                        </div>
                        <div class="mb-4">
                            <label for="">內文</label>
                            <textarea name="body" id="" cols="30" rows="10" class="border border-zinc-400 rounded w-full">{{$post->body}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="">上架日期</label>
                            <input type="datetime-local" name="publish_at" class="border border-zinc-400 rounded w-full" value="{{$post->publish_at}}">
                        </div>
                        <div class="mb-4">
                            <label for="">下架日期</label>
                            <input type="datetime-local" name="unpublish_at" class="border border-zinc-400 rounded w-full" value="{{$post->unpublish_at}}">
                        </div>
                        <div class="mb-4">
                            <label for="">上架</label>
                            <select name="published" id="" class="border border-zinc-400 rounded w-full p-3">
                                <option value="1" {{$post->published == 1 ? 'selected':'';}}>上架</option>
                                <option value="0"{{$post->published == 0 ? 'selected':'';}}>下架</option>
                            </select>
                        </div>

                        <input type="submit" value="修改" class="bg-blue-500 rounded text-white px-3 py-2">
                    </form>
                    <br>
                    <form action="/user/post/{{$post->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="刪除" class="px-3 py-2 bg-red-600 rounded text-white" onclick="return confirm('確認刪除？')">
                        <input type="button" value="返回" class="px-3 py-2 bg-zinc-700 rounded text-white" onclick="history.back()">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea',  // change this value according to your HTML
    language:'zh_TW'

});
</script>
