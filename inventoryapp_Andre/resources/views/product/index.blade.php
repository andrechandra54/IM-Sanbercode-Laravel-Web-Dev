@extends('layouts.master')
@section('title')
    Product List
@endsection
@section('content')

    @if (session('success'))

        <div class="alert alert-success">
            {{session('success')}};
        </div>
        
    @endif
    
    @if (Auth::check() && Auth::user()->role === 'admin')
    
        <a href="/product/create" class="btn btn-primary btn-sm">Add New Product</a><br><br>
        
    @endif

    <div class="row">
        
        @forelse ($products as $item)

            <div class="col-4">

                <div class="card" style="width: 18rem;">
                    <img src="{{asset('image/'.$item->image)}}" height="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$loop->iteration}}. {{$item->name}}</h5>
                        <span class="badge bg-info  ">{{$item->categories->name}}</span>
                        <p class="card-text">{{Str::limit($item->description, 20, '...')}}</p>
                        <form action="/product/{{$item->id}}" method="POST">
                        
                            @csrf

                            <a href="/product/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/transaction/{{$item->id}}/create" class="btn btn-info btn-sm">Purchase</a>

                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <a href="/product/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>

                                @method("DELETE")
                                
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            @endif
                        </form>
                    </div>
                </div>
            </div>   
                
        @empty
                
            <h4>PRODUCT LIST EMPTY</h4>
                
        @endforelse      

    </div>

    <a href="/" class="btn btn-secondary btn-sm">Return</a>
@endsection