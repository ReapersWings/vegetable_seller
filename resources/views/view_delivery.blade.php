@extends('header')
@section('content')
    <div>
        <a href="javascript:void(0)">Delivery</a>
        <a href="{{ route('view_pickup') }}">Pick up</a>
        <a href="{{ route('history') }}">History</a>
        @if (count($preparing[0]) === 0 && count($ontheway[0]) === 0)
            <h1>--Not Vegetable have been delivery--</h1>
        @else
            <table class="table">
                <thead>
                    <th>Preparing</th>
                </thead>
                <x-display-result :row=$preparing[0] , data="Not Delivery be preparing!"/>
            </table>
            <table class="table">
                <thead>
                    <th colspan="2">On The Way</th>
                </thead>
                <x-display-result :row=$ontheway[0] , data="Not Delivery be on the way!" />
            </table>
            <div>
                <p style="text-align: center">You need to contect to seller when you need to Refun</p>
                <p style="text-align: center">012-3456789</p>
            </div>
        @endif
    </div>
    
    <style>
        th{
            background-color:grey
        }
        .text{
            margin:0px;
            text-align: center;
        }
        table,td{
            border: 2px solid black;
            border-collapse: collapse;
        }
        button.product{
            width: 50%;
            float: left;
            border-radius: 15px;
        }
        table.table{
            width: 50%;
            float: left;
        }

    </style>
@endsection