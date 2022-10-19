@extends('template.master')
@section('main')
<div class="container">
    <h1>INDEX</h1>
    @foreach($products as $product)
    <div>
        <h2>{{$product->title}}</h2>
    </div>
    @endforeach
</div>
@endsection
