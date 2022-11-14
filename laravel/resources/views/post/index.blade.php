

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="/user/post/create" class="inline-block px-5 py-3 rounded bg-teal-300">新增文章</a>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-4xl font-bold mb-3">文章列表</h3>
                    @foreach($posts as $post)
                    <div class="my-4 border border-zinc-500 p-4 rounded">
                        <h4 class="text-3xl font-bold mb-3">
                            {{$post->title}}
                        </h4>
                        <div class="mb-4">
                            {!!$post->body!!}
                        </div>
                        <a href="/user/post/{{$post->id}}" class="px-3 py-2 bg-sky-400 rounded">檢視</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
