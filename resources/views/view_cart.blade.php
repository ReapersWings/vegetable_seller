@extends('header')
@section('content')
<div style="margin: 20px;">
     @foreach ($cart[0] as $row)
        <div class="div">
            <img src="{{ asset('storage/'.$row['image']) }}" alt="">
            <p>Product Name:<b>{{ $row['p_name'] }}</b></p>
            <p>p_price:<b>RM{{ $row['p_price'] }}</b></p>

        </div>
    @endforeach
</div>
   <select name="addres" id=""></select>
    <style>
        div.div{
            width: 100%;
        }
    </style>
@endsection