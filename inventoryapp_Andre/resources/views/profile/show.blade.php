@extends('layouts.master')
@section('title')
    Profile
@endsection
@section('content')

    @if (session('success'))

        <div class="alert alert-success">
            {{session('success')}};
        </div>
        
    @endif

    <p><h4>{{$user->name}} - {{$profile->age}}</h4></p>
    <p><h4>{{$profile->bio}}</h4></p>

    <a href="/profile/update" class="btn btn-secondary btn-sm">Update</a>

    <a href="/" class="btn btn-secondary btn-sm">Return</a>
@endsection