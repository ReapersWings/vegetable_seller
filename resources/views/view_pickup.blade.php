@extends('header')
@section('content')
<div>
    <a href="{{ route('delivery') }}">Delivery</a>
    <a href="javascript:void(0)">Pick up</a>
    <a href="{{ route('history') }}">History</a>
    {{ $example="" }}
    @if (count($data) !== 0)
    <div style="width: 99%;overflow-y:auto;border:2px solid black;padding:5px;padding-left:7px;padding-right:7px;overflow-x:scroll">
        @foreach ($data as $row)
            @if ($row['checkout_id']!==$example)
            <div style="border: 2px solid black ; float:left;width:20%;height:inherit;padding:3px">
                <h1 class="text">{{ $row['c_token_pick_up'] }}</h1>
                @php
                    $totalprice= 0 ;
                    $example = $row['checkout_id']
                @endphp
                @foreach ($data as $rows)
                    @if ($rows['checkout_id']===$example)
                        <a href="{{ route('view_product_delivery',['id'=>$row['c_id'],'type'=>'pickup']) }}">
                            <button style="width: 100%;">
                                <p class="text">Vegetable name : <b>{{ $rows['p_name'] }}</b></p>
                                <p class="text"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }}</b></p>
                            </button>
                        </a>
                        @php
                            $totalprice +=$rows['c_total_price']
                        @endphp
                    @endif
                @endforeach
                <h4 class="text">Total Price : <b>RM{{ $totalprice }}</b></h4>
                <h3 class="text">Date take before:</h3>
                <h2 class="text">{{ $row['p_expire_date'] }}</h2>
                
            </div>
            @endif
        @endforeach
    </div>
    <div>
        <p style="text-align: center">You need to contect to seller when you need to Refun</p>
        <p style="text-align: center">012-3456789</p>
    </div>
    @endif
    
    
</div>
<style>
    .text{
        margin: 0px;
        text-align: center;
    }
</style>
@endsection