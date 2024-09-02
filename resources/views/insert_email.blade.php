@extends('form_header')
@section('content')
<form action="{{ route('f_inputemail') }}" method="post">
    @csrf
    <h1>Forgot password</h1>
    <label for="">Email:</label>
    <input type="text" name="email">
    <input type="submit" id="submit">
</form>
@endsection