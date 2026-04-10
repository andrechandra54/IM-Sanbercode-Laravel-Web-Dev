@extends('layouts.master')
@section('title')
    Category Detail
@endsection
@section('content')
    
    <h1 class="text-primary">{{$category->name}}</h1>
    <p>{{$category->description}}</p>

    @if (session('success'))

        <div class="alert alert-success">
            {{session('success')}};
        </div>
        
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category->products as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>

                        <form action="/product/{{$item->id}}" method="POST">
                        
                            @csrf
                            @method("DELETE")

                            <a href="/product/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/product/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td>PRODUCT EMPTY</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="/category" class="btn btn-secondary btn-sm">Return</a>
@endsection