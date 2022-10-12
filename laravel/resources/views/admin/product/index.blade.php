@extends('admin.template.master')
@section('main')
<div class="p-3">
    <h1 class="text-4xl bold">商品管理</h1>
    <table>
        <tr>
            <tr>
                <th>商品名稱</th>
                <th>售價</th>
                <th>特價</th>
                <th>上架日期</th>
            </tr>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->special_price}}</td>
            <td>{{$product->publish_at}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
