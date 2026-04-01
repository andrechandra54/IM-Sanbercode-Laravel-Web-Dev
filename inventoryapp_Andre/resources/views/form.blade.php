@extends('layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <form action="/welcome" method="post">
        @csrf
        <label>First Name:</label><br><br>
            <input type="text" name="fname" required><br><br>
        <label>Last Name:</label><br><br>
            <input type="text" name="lname" required><br><br>
        <label>Gender:</label><br><br>
            <input type="radio" name="gender" value="1" required>Male<br>
            <input type="radio" name="gender" value="2">Female<br>
            <input type="radio" name="gender" value="3">Other<br><br>
        <label>Nationality:</label><br><br>
            <select name="nationality" required>
                <option value="1">Indonesian</option>
                <option value="2">Others</option>
            </select><br><br>
        <label>Language Spoken:</label><br><br>
            <input type="checkbox" name="language" value="1">Bahasa Indonesia<br>
            <input type="checkbox" name="language" value="2">English<br>
            <input type="checkbox" name="language" value="3">Other<br><br>
        <label>Bio:</label><br><br>
            <textarea name="bio" rows="10" cols="40" required></textarea>
        <br>
        <input type="submit" value="Sign Up">
    </form>
    <a href="/">Kembali</a>
@endsection