@extends('header')
@section('content')
    <a href="{{ route('delivery') }}">Delivery</a>
    <a href="{{ route('view_pickup') }}">Pick up</a>
    <a href="javascript:void(0)">History</a>
@endsection