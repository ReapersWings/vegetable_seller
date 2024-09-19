@extends('admin_header')
@section('content')
    <table style="width: 100%">
        <thead>
            <th style="width: 80%;">Product:</th>
            <th style="width: 10%;">Edit:</th>
            <th style="width: 10%;">Delete:</th>
        </thead>
        
        @foreach ($product as $row)
        {{ $loop= 0 ; }}
            <tr>
                <td>
                    <div style="width: 30%;height:20%;float: left;">
                        <img src="{{ asset('storage/'.$row['image']) }}" style="max-width:100%;max-height:100%;" alt="">
                    </div>
                    <div style="float: left">
                        <h1>{{ $row['p_name'] }}</h1>
                        <p>Price(1KG): <b>RM{{ $row['p_price'] }}</b> </p>
                        <p>Total Quantity:<b>{{ $row['p_total_quantity']/1000 }}KG</b></p>
                        <form action="" method="post">
                            <label for="">Mass Add(G):</label>
                            <input type="number" name="quantity" id="mass" value="0">
                            <button type="button" onclick="addmass('mass{{ $loop }}',100)">+100g</button>
                            <button type="button" onclick="addmass('mass{{ $loop }}',1000)">+1kg</button>
                        </form>
                        @php
                            $loop+=1 ;
                    @endphp
                    </div>
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
    <script>
        function addmass(plece , number){
            var addmassnumber =document.getElementById(plece)
            var result = parseInt(addmassnumber.value)+number
            addmassnumber.value=result
        }
    </script>
    <style>
        table,th,td{
            border: 2px solid black;
        }
    </style>
@endsection