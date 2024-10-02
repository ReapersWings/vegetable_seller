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
                    <div style="width: 30%;height:20%;float: left;">
                        <img src="{{ asset('storage/'.$row['image']) }}" style="max-width:100%;max-height:100%;" alt="">
                    </div>
                    <div style="float: left">
                        <h1>{{ $row['p_name'] }}</h1>
                        <p>Price(1KG): <b>RM{{ $row['p_price'] }}</b> </p>
                        <p>Total Quantity:<b>{{ $row['p_total_quantity']/1000 }}KG</b></p>
                        <form action="{{ route('f_add_quantity',$row['id']) }}" method="post" style="width: 100%">
                            @csrf
                            <label for="">Mass Add(G):</label><br>
                            <input type="number" name="quantity" id="{{ 'mass'.$row['id'] }}" value="0" style="width: 100%;" readonly><br>
                            <button type="button" onclick="addmass('{{ 'mass'.$row['id'] }}',10000,'negatif')" style="margin-top:5px;">-10kg</button>
                            <button type="button" onclick="addmass('{{ 'mass'.$row['id'] }}',1000,'negatif')" style="margin-top:5px;">-1kg</button>
                            <button type="button" onclick="addmass('{{ 'mass'.$row['id'] }}',100,'negatif')" style="margin-top:5px;">-100g</button>
                            <button type="button" onclick="addmass('{{ 'mass'.$row['id'] }}',100,'add')" style="margin-top:5px;">+100g</button>
                            <button type="button" onclick="addmass('{{ 'mass'.$row['id'] }}',1000,'add')" style="margin-top:5px;">+1kg</button>
                            <button type="button" onclick="addmass('{{ 'mass'.$row['id'] }}',10000,'add')" style="margin-top:5px;">+10kg</button><br>
                            <button type="submit" style="width: 100%;margin-top:5px;">Submit</button>
                        </form>
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
        function addmass(plece , number , add){
            var addmassnumber =document.getElementById(plece)
            if (add === "add") {
                addmassnumber.value= parseInt(addmassnumber.value) +number
            } else {
                if (parseInt(addmassnumber.value)-number >=0) {
                   addmassnumber.value= parseInt(addmassnumber.value) -number 
                }
            }
              
        }
    </script>
    <style>
        td>a>button{
            height: 335px;
            font-size: 40px
        }
        table,th,td{
            border: 2px solid black;
        }
        /* form{
            border: 2px solid black;
        } */
        label{
            border-bottom: 2px solid black;
            text-align: center;
            width: 100%;
            margin-bottom: 5px;
        }
        form > button{
            
            margin: 0px;
            height: 25px;
        }
    </style>
@endsection