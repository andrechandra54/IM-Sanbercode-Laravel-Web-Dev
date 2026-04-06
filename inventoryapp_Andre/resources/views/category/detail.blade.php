@extends('layouts.master')
@section('title')
    Category Detail
@endsection
@section('content')
    
    <h1 class="text-primary">{{$category->name}}</h1>
    <p>{{$category->description}}</p>

    <a href="/category" class="btn btn-secondary btn-sm">Return</a>
@endsection