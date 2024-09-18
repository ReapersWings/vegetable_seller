@extends('form_header')
@section('content')
@php
    $row =$data[0] ;
@endphp
    <table>
        <thead>
            <td style="border-right: 2px solid black ;border-bottom: 2px solid black;width: 65%;">Data you chenge:</td>
            <td style="width: 35%;">Data old</td>
        </thead>
        <tr>
            <td>
                <form action="{{ route('f_edit_product',$row['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="">Product image:</label>
                    <input type="file" name="image" id="image" onchange="changeImage(this)">
                        <img src={{ asset('storage/'.$row['image']) }} alt="" id="imagedisplay">
                    <label for="">Product name:</label>
                    <input type="text" value="{{ $row['p_name'] }}" name="p_name">
                    <label for="">Product Price(1KG):</label>
                    <input type="text" value="{{ $row['p_price'] }}" name="p_price">
                    <label for="">Total Quantity:</label>
                    <input type="number" value="{{ $row['p_total_quantity'] }}" name="p_total_quantity" id="quantity">
                    <input type="button" value="-100G" onclick="add_quantity(100,'-')">
                    <input type="button" value="-1KG" onclick="add_quantity(1000,'-')">
                    <input type="button" value="+1KG" onclick="add_quantity(1000,'+')">
                    <input type="button" value="+100G" onclick="add_quantity(100,'+')">
                    <button type="submit" name="product" value="{{ $row['id'] }}" >Submit</button>
                </form>
            </td>
            <td style="border-left: 2px solid black ; border-top: 2px solid black;width: 35%;text-align:center">
                <img style="max-width:100%" src="{{ asset('storage/'.$row['image']) }}" alt="">
                <h1>Product Name : <br>{{ $row['p_name'] }}</h1>
                <p style="color: black;text-align: center;">Product price: <b>RM{{ $row['p_price'] }}/1KG</b></p>
                <p style="color: black;text-align: center;">Total_quantity: <b>{{ $row['p_total_quantity'] }}G</b></p>
            </td>
        </tr>
    </table>
    <style>
        button{
            width: 25%;

        }
        img{
            max-width: 49%;
            max-height: 300px;
        }
        table{
            border-collapse: collapse;
        }
        th,td{
            text-align: center;
        }
        input[type="button"]{
            width: 24%;
            padding: 5px;
            border: 4px solid #ccc;
            border-radius: 15px;
        }
    </style>
    <script>
        function add_quantity(number , add){
            var original = document.getElementById('quantity')
            if (add === "+") {
                var answer = parseInt(original.value)+number
                original.value= answer
            } else {
                original.value= original.value-=number
            }
        }
        function changeImage(inputElement) {
    var img = inputElement.files[0]; // Get the first file selected
    if (img) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('imagedisplay').src = e.target.result;
        }

        reader.readAsDataURL(img); // Read the file as a data URL (base64 string)
    } else {
        console.log("No file selected");
    }
}
    </script>
@endsection