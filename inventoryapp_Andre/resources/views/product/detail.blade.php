@extends('layouts.master')
@section('title')
    Product Detail
@endsection
@section('content')
    
    <h1 class="text-primary">{{$product->name}}</h1>
    <img src="{{asset('image/'.$product->image)}}" class="img-fluid" alt="...">
    <p><h3>{{$product->description}}</h3></p>
    <p><h4>Price : IDR {{$product->price}}</h4></p>
    <p><h4>Stock : {{$product->stock}}</h4></p>

    <a href="/transaction/{{$product->id}}/create" class="btn btn-info btn-sm">Purchase</a><br><br>

    <a href="/product" class="btn btn-secondary btn-sm">Return</a>
@endsection