@extends('form_header')
@section('content')
@if (session()->has('message'))
    <script>window.alert({{ session('message') }})</script>
@endif
<form action="{{ route('f_login') }}" method="POST">
    <h1>Login</h1>
    @csrf
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
    <input type="submit" id="submit">   
    <a href="{{ route('register') }}"><button type="button" id="submit">Register</button></a>
</form> 

@endsection