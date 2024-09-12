@extends('form_header')
@section('content')
    <form action="{{ route('f_seller_login') }}" method="post">
        @csrf
        <h1>Seller Login</h1>
        <label for="">Username:</label>
        <input type="text" name="username" value="{{ old('username') }}">
        @error('username')
            <p>{{ $message }}</p>
        @enderror
        <label for="">Password:</label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit" id="submit">Submit</button>
    </form>
@endsection