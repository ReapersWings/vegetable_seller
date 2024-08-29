@extends('header')
@section('content')
    @php
        $row=$data[0] ;
        if ($type === 'delivery') {
            $state = $row->d_state ;
        }else{
            $state = 'pickup';
        }
    @endphp
    <h1 style="text-align: center"><ins>Data product you buy</ins></h1>
    <a href="{{ route('product_data',$row->product_id) }}"><button style="width:46%;float:left;padding:25px">
        <h2 class="text"><b><ins>Data Product:</ins></b></h1>
        <img src="{{ asset('storage/'.$row->image) }}" class="img" alt="">
        <h2 class="text">{{ $row->p_name }}</h1>
        <h4 class="text">Price:<b>RM{{ $row->p_price }}/1000G</b></h4>
    </button></a>
    <div style="width: 46%;float:right;padding:25px">
        <h2 class="data"><b><ins>Data product for you:</ins></b></h2>
        <h3 class="data">Your Quantity: <b>{{ $row->c_quantity }}G</b></h3>
        <h3 class="data">Total price: <b>RM{{ $row->c_total_price }}</b></h3>
        @switch($state)
            @case('be_ready')
                <h1 class="data"><b>Preparing</b></h1>
                @break
            @case('on_the_way')
                <h1 class="data"><b>On The Way</b></h1>
                @break
            @case('successful')
                <h1 class="data"><b>Successful</b></h1>
                @break
            @default
                <h1 class="data"><b>Pick Up</b></h1>
        @endswitch
    </div>
    <style>
        h2.text{
            font-size: 25px;
        }
        img.img{
            max-width: 100%;
        }
        h4.text{
            margin:10px;
        }
        .text{
            text-align: center;
            margin: 0px;
        }
        h2.data{
            text-align: center;
        }
        h1.data {
            margin: 0px;
            padding: 25px;
            font-size: 50px;
            text-align: center;
            border: 3px solid black;
        }
    </style>
@endsection