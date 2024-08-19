@extends('header')
@section('content')
    <img src="{{ asset('storage/'.$data->image) }}" alt="">
    <h1>{{ $data->p_name }}</h1>
    <h4>{{ $data->p_total_quantity }}</h4>
    <p><b>{{ $data->p_price }}</b></p>
@endsection