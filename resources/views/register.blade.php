@extends('form_header')
@section('content')
@if (session()->has('message'))
    <script>window.alert({{ session('message') }})</script>
@endif
<form action="{{ route('f_register') }}" method="POST">
    <h1>Register</h1>
    @csrf
    <label for="">Username:</label>
    <input type="text" name="name" value="{{ old('name') }}"><br>
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}"><br>
    @error('email')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Password:</label>
    <input type="password" name="password"><br>
    @error('password')
        <p>{{ $message }}</p>
    @enderror
    <labeL>Password verify:</labeL>
    <input type="password" name="password_confirmation"><br>
    <input type="submit" id="submit">
</form>
@endsection