@extends('form_header')
@section('content')
    <form action="{{ f_reset_password }}" method="post">
        @csrf
        <label for="">New Password:</label>
        <input type="password" name="password" >
        <label for="">Comfirm password:</label>
        <input type="password" name="password_confirmation" id="">
        <button type="submit" name="email" value="{{ session('email') }}">Submit</button>
    </form>
@endsection