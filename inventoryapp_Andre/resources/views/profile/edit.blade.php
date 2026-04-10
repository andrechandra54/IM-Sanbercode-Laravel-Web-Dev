@extends('layouts.master')
@section('title')
    Update Profile
@endsection
@section('content')
    <form action="/profile" method="post">
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

        <label>Age:</label><br><br>
            <input type="number" value="{{$profile->age}}" name="age"><br><br>
        <label>Bio:</label><br><br>
            <textarea name="bio" rows="10" cols="40">{{$profile->bio}}</textarea>
        <br>
        <input type="submit" value="Update" class="btn btn-primary btn-sm">
    </form><br>
    <a href="/" class="btn btn-secondary btn-sm">Return</a>
@endsection