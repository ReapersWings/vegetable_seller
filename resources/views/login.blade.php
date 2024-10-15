@extends('form_header')
@section('content')
<form action="{{ route('f_login') }}" method="POST">
    @csrf
    <h1>Login</h1>
    <label for="username">Username:</label>
    <input type="text" id="username" name="name" value="{{ old('name') }}"><br>
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br>
    @error('password')
        <p>{{ $message }}</p>
    @enderror
    
    <a href="{{ route('inputemail') }}" style="float: left; margin-bottom: 15px;">Forgot password?</a>
    
    <input type="submit" id="submit" value="Login">
    
    <a href="{{ route('register') }}">
        <button type="button" id="register">Register</button>
    </a>
</form>
@endsection

<style>
    body {
        background-color: aquamarine;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    div {
        max-width: 90%; /* Mobile-friendly width */
        border-radius: 25px;
        text-align: center;
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
        border: 4px solid rgb(209, 207, 207);
        background-color: white;
        padding: 20px;
    }

    form {
        padding: 15px; /* Reduced padding for small screens */
        margin: 0;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    label {
        float: left;
        width: 100%; /* Full width on mobile */
        margin-bottom: 10px;
        text-align: left;
        font-size: 16px;
    }

    input[type="text"], input[type="password"], input[type="submit"], button {
        width: 100%; /* Full width for inputs and buttons */
        border-radius: 10px;
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    input[type="submit"], button {
        background-color: #f2f2f2;
        border: 4px solid rgb(209, 207, 207);
        border-radius: 25px;
    }

    p {
        color: red;
        text-align: left;
        margin-bottom: 10px;
    }

    a {
        text-decoration: none;
        font-size: 14px;
        color: #007BFF;
        display: block;
        margin-bottom: 20px;
    }

    button {
        padding: 10px;
        font-size: 16px;
        background-color: #f2f2f2;
    }

    @media (min-width: 768px) {
        /* Larger screens */
        div {
            max-width: 50%; /* Restore original width for larger screens */
        }

        h1 {
            font-size: 32px;
        }

        label {
            font-size: 18px;
        }

        input[type="text"], input[type="password"], input[type="submit"], button {
            font-size: 18px;
        }
    }
</style>
