@extends('admin_header')
@section('content')
    <table style="width: 100%">
        <thead>
            <th style="width: 80%;">Product:</th>
            <th style="width: 10%;">Edit:</th>
            <th style="width: 10%;">Delete:</th>
        </thead>
        @foreach ($product as $row)
            <tr>
                <td>
                    <img src="{{ asset('storage/'.$row['image']) }}" alt="">
                    <h1>{{ $row['p_name'] }}</h1>
                    <p>Price(1KG): <b>RM{{ $row['p_price'] }}</b> </p>
                    <p>Total Quantity:<b>{{ $row['p_total_quantity']/1000 }}KG</b></p>
                </td>
                <td>
                    <a href="{{ route('edit_product',$row['id']) }}"><button  style="width: 100%">Edit</button></a>
                </td>
                <td>
                    <a href="{{ route('delete_product',$row['id']) }}">
                        <button  style="width: 100%">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <style>
        table,th,td{
            border: 2px solid black;
        }
    </style>
@endsection