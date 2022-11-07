

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
                    <h3 class="text-4xl font-bold mb-3">新增文章</h3>
                    <form action="/admin/product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="">名稱</label>
                            <input type="text" name="title" class="border border-zinc-400 rounded w-full">
                        </div>

                        <div class="mb-4">
                            <label for="">封面</label>
                            <input type="file" name="cover w-full">
                        </div>
                        <div class="mb-4">
                            <label for="">內文</label>
                            <textarea name="description" id="" cols="30" rows="10" class="border border-zinc-400 rounded w-full"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="">上架日期</label>
                            <input type="datetime-local" name="publish_at" class="border border-zinc-400 rounded w-full">
                        </div>
                        <div class="mb-4">
                            <label for="">下架日期</label>
                            <input type="datetime-local" name="unpublish_at" class="border border-zinc-400 rounded w-full">
                        </div>
                        <div class="mb-4">
                            <label for="">上架</label>
                            <select name="published" id="" class="border border-zinc-400 rounded w-full p-3">
                                <option value="1">上架</option>
                                <option value="0">下架</option>
                            </select>
                        </div>

                        <input type="submit" value="新增文章" class="bg-blue-500 rounded text-white px-8 py-3">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

