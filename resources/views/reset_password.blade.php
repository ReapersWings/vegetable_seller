@extends('form_header')
@section('content')
    <form action="{{ route('f_reset_password') }}" method="post">
        @csrf
        <h1>Reset the password</h1>
        <label for="">New Password:</label>
        <input type="password" name="password" >
        <label for="">Comfirm password:</label>
        <input type="password" name="password_confirmation" id="">
        <button type="submit" id="submit" name="email" value="{{ session('email') }}">Submit</button>
    </form>
@endsection