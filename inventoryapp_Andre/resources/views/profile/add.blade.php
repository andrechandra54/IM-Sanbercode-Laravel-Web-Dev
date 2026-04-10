@extends('layouts.master')
@section('title')
    Add Profile
@endsection
@section('content')
    <form action="/profile" method="post">
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

        <label>Age:</label><br><br>
            <input type="number" name="age"><br><br>
        <label>Bio:</label><br><br>
            <textarea name="bio" rows="10" cols="40"></textarea>
        <br>
        <input type="submit" value="Add" class="btn btn-primary btn-sm">
    </form><br>
    <a href="/" class="btn btn-secondary btn-sm">Return</a>
@endsection