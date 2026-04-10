@extends('layouts.master')
@section('title')
    Update Transaction
@endsection
@section('content')
    <form action="/transaction/{{$transaction->id}}" method="post">
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

        <label>Type:</label><br><br>
            <select name="type" id="">
                <option value="in">In</option>
                <option value="out">Out</option>
            </select><br><br>
        <input type="submit" value="Update" class="btn btn-primary btn-sm">
    </form><br>
    <a href="/transaction" class="btn btn-secondary btn-sm">Return</a>
@endsection