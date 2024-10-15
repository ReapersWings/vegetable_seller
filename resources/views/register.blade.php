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
    <label for="">Phoen number:</label>
    <input type="text" name="phone_number" value="{{ old('phone_number') }}"><br>
    @error('phone_number')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Password:</label>
    <input type="password" name="password"><br>
    @error('password')
        <p>{{ $message }}</p>
    @enderror
    <labeL>Password verify:</labeL>
    <input type="password" name="password_confirmation"><br>
    <button type="submit" id="submit">Submit</button>
    <a href="{{ route('login') }}"><button type="button">Back</button></a>
</form>
@endsection