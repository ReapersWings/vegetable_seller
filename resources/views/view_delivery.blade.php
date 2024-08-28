@extends('header')
@section('content')
    @php
        $row=$preparing[0] ;
    @endphp
    @if (count($preparing[0]) === 0 && count($ontheway[0]) === 0)
    @else
        <table class="table">
            <thead>
                <th>Preparing</th>
            </thead>
            <x-display-result :row=$row , data="Not Delivery be preparing!"/>
        </table>
        <table class="table">
            <thead>
                <th colspan="2">On The Way</th>
            </thead>
            <x-display-result :row=$ontheway[0] , data="Not Delivery be on the way!" />
        </table>
    @endif
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
            float: right;
            border-radius: 15px;
        }
        table.table{
            width: 50%;
            float: left;
        }

    </style>
@endsection