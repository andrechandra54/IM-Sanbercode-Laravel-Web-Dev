@extends('layouts.master')
@section('title')
    Edit Product
@endsection
@section('content')
    <form action="/product/{{$product->id}}" method="post" enctype="multipart/form-data">
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

        <label>Product Name:</label><br><br>
            <input type="text" name="name" value="{{$product->name}}"><br><br>
        <label>Product Image:</label><br><br>
            <input type="file" name="image"><br><br>
        <label>Product Description:</label><br><br>
            <textarea name="description" rows="10" cols="40">{{$product->description}}</textarea>
        <br>
        <label>Product Price:</label><br><br>
            <input type="number" name="price" value="{{$product->price}}"><br><br>
        <label>Product Stock:</label><br><br>
            <input type="number" name="stock" value="{{$product->stock}}"><br><br>
        <label>Product Category:</label><br><br>
            <select name="category_id" id="">
            <option value="">--Select Category--</option>
                @forelse ($categories as $item)
                    @if ($item->id === $product->category_id)
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                @empty
                    <option value="">No Category</option>
                @endforelse  
            </select><br><br>
        <input type="submit" value="Save Changes" class="btn btn-primary btn-sm">
    </form><br>
    <a href="/product" class="btn btn-secondary btn-sm">Return</a>
@endsection