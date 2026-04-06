@extends('layouts.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <form action="/category/{{$category->id}}" method="post">
        @csrf

        @method("PUT")

        @if ($errors->any())    
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>    
        @endif

        <label>Category Name:</label><br><br>
            <input type="text" name="name" value="{{$category->name}}"><br><br>
        <label>Category Description:</label><br><br>
            <textarea name="description" rows="10" cols="40">{{$category->description}}</textarea>
        <br>
        <input type="submit" value="Edit" class="btn btn-primary btn-sm">
    </form><br>

    <a href="/category" class="btn btn-secondary btn-sm">Return</a>
@endsection