@extends('layouts.master')
@section('title')
    Add New Product
@endsection
@section('content')
    <form action="/product" method="post" enctype="multipart/form-data">
        @csrf

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

        <label>Product Name:</label><br><br>
            <input type="text" name="name"><br><br>
        <label>Product Image:</label><br><br>
            <input type="file" name="image"><br><br>
        <label>Product Description:</label><br><br>
            <textarea name="description" rows="10" cols="40"></textarea>
        <br>
        <label>Product Price:</label><br><br>
            <input type="number" name="price"><br><br>
        <label>Product Stock:</label><br><br>
            <input type="number" name="stock"><br><br>
        <label>Product Category:</label><br><br>
            <select name="category_id" id="">
            <option value="">--Select Category--</option>
                @forelse ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    <option value="">No Category</option>
                @endforelse  
            </select><br><br>
        <input type="submit" value="Add" class="btn btn-primary btn-sm">
    </form><br>
    <a href="/product" class="btn btn-secondary btn-sm">Return</a>
@endsection