@extends('header')
@section('content')
<div>
    <a href="{{ route('delivery') }}">Delivery</a>
    <a href="{{ route('view_pickup') }}">Pick up</a>
    <a href="{{ route('history_checkout') }}">History</a>
    @foreach ($data as $item)
        <a href="{{ route }}">
            <div>
                
            </div>
        </a>
    @endforeach
</div>
    
@endsection