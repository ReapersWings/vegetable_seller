@extends('form_header')
@section('content')
@if (session()->has('message'))
    <script>window.alert({{ session('message') }})</script>
@endif
<form action="{{ route('f_verify') }}" method="POST">
    @csrf
    <label for="">Email Verify:</label>
    <input type="text" name="token">
    <input type="submit" id="submit">
</form>
@endsection