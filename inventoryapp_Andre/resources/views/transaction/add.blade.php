@extends('layouts.master')
@section('title')
    Purchase {{$product->name}}
@endsection
@section('content')
    <form action="/transaction" method="post">
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
            
        <label>Product:</label><br><br>
            <select name="product_id" id="">
                <option value="{{$product->id}}">{{$product->name}}</option>
            </select><br><br>

        <label>Amount:</label><br><br>
            <input type="number" name="amount"><br><br>
        <label>Notes:</label><br><br>
            <textarea name="notes" rows="10" cols="40"></textarea>
        <br>
        <input type="submit" value="Confirm" class="btn btn-primary btn-sm">
    </form><br>
    <a href="/product" class="btn btn-secondary btn-sm">Return</a>
@endsection