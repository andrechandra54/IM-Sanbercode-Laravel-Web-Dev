@extends('layouts.master')
@section('title')
    List Category
@endsection
@section('content')
    <a href="/category/create" class="btn btn-primary btn-sm">Add New Category</a>

    @if (session('success'))

        <div class="alert alert-success">
            {{session('success')}};
        </div>
        
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>

                        <form action="/category/{{$item->id}}" method="POST">
                        
                            @csrf
                            @method("DELETE")

                            <a href="/category/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td>CATEGORY EMPTY</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="/" class="btn btn-secondary btn-sm">Return</a>
@endsection