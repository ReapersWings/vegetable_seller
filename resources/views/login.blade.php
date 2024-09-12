@extends('form_header')
@section('content')
<form action="{{ route('f_login') }}" method="POST">
    @csrf
    <h1>Login</h1>
    <label for="">Username:</label>
    <input type="text" name="name" value="{{ old('name') }}"><br>
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Password:</label>
    <input type="password" name="password"><br>
    @error('password')
        <p>{{ $message }}</p>
    @enderror
    <a href="{{ route('inputemail') }}">forgot password</a>
    <input type="submit" id="submit">
    <a href="{{ route('register') }}"><button type="button" id="submit">Register</button></a>
</form> 
@endsection