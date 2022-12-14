@extends('admin.template.master')
@section('main')
<div class="p-3">
    <h1 class="text-4xl bold mb-5">編輯商品</h1>

    <form action="/admin/product/{{$product->id}}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="">商品名稱</label>
            <input type="text" name="title" class="border border-zinc-900" value="{{$product->title}}">
        </div>
        <div class="mb-4">
            <label for="">商品敘述</label>
            <textarea name="description" id="" cols="30" rows="10" class="border border-zinc-900">{{$product->description}}</textarea>
        </div>
        <div class="mb-4">
            <label for="">售價</label>
            <input type="text" name="price" class="border border-zinc-900" value="{{$product->price}}">
        </div>
        <div class="mb-4">
            <label for="">特價</label>
            <input type="text" name="special_price" class="border border-zinc-900" value="{{$product->special_price}}">
        </div>
        <div class="mb-4">
            <label for="">上架日期</label>
            <input type="datetime-local" name="publish_at" class="border border-zinc-900" value="{{$product->publish_at}}">
        </div>
        <div class="mb-4">
            <label for="">下架日期</label>
            <input type="datetime-local" name="unpublish_at" class="border border-zinc-900"value="{{$product->unpublish_at}}">
        </div>
        <div class="mb-4">
            <label for="">上架</label>
            <select name="published" id="" class="border border-zinc-900">
                <option value="1" {{$product->published == 1 ? 'selected':''}}>上架</option>
                <option value="0" {{$product->published == 0 ? 'selected':''}}>下架</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="">特色商品</label>
            <label for="">
                <input type="radio" name="is_feature" value="1" {{$product->is_feature == 1 ? 'checked':''}}>
                是
            </label>
            <label for="">
                <input type="radio" name="is_feature" value="0" {{$product->is_feature == 0 ? 'checked':''}}>
                否
            </label>
        </div>
        <input type="submit" value="修改商品" class="bg-zinc-900 text-white px-8 py-3">
    </form>
</div>
@endsection
