@extends('header')
@section('content')
<form action="{{ route('f_checkout') }}" method="post">
    @csrf
<div style="margin: 20px;margin-bottom:10px">
    @php
        $fornum=0 ;
    @endphp
    @if (!$cart[0])
        <div class="div"></div>
    @else
    @php
        $row = $cart[0]
    @endphp
    @for ($i = 0; $i < count($row); $i++)
        <div class="div">
            <div class="selectcheckout">
                <input type="checkbox" style="margin: 44%" name="{{ 'selectcheckout'.$i }}" value="{{ $row[$i]['carts_id'] }}:{{ $row[$i]['id'] }}:{{ $row[$i]['p_total_quantity'] }}" id="" >
            </div>
                <img src="{{ asset('storage/'.$row[$i]['image']) }}" class="img" alt="">
                <div class="data">
                    <p style="margin: 0%">Product Name:<b>{{ $row[$i]['p_name'] }}</b></p>
                    <label for="">Quantity need</label>
                    <input type="number" min="100" step="100" value="{{ $row[$i]['c_quantity'] }}" name="{{ "quantity".$i }}" max="{{ $row[$i]['p_total_quantity'] }}" id="{{ "quantity".$i }}" oninput="calculate({{ $row[$i]['p_price']}},'{{ 'quantity'.$i }}','{{'price'.$i }}')">KG<br>
                    <label for="">Total Price: RM</label>
                    <input type="number"  min="0.00" value="{{ $row[$i]['p_price'] }}" name="{{ "price".$i }}" id="{{ "price".$i }}" readonly><br>
                </div>
            </div>
    @endfor 
    @endif
</div>
<div style="float: left;width:20%">
    <input type="radio" name="checkout" onchange="display()" value="delivery" id="" checked>
    <label for="">Delivery</label><br>
    <input type="radio" name="checkout" onchange="playhidden()" value="pick_up" id="" >
    <label for="">Pick Up</label>
</div>
<div id="hidden">
    <select name="addres" id="">
    
    @if (count($addres[0])===0)
        <option value="">--Not addres--</option>
    @else
        @foreach ($addres[0] as $row)
            <option value="{{ $row->id }}">{{ $row->name_location }}</option>
        @endforeach
    @endif
    </select>
</div>
<div>
    <button type="submit" name="submit" value="{{ $i-=1 }}">Checkout</button>
</div>
</form>

<script>
    function display(){
        document.getElementById('hidden').style.display=''
    }
    function playhidden(){
        document.getElementById('hidden').style.display='none'
    }
    function calculate(originalprice , p_total_quantity , p_total_price){
        var valuequantity = document.getElementById(p_total_quantity).value
        document.getElementById(p_total_price).value= valuequantity / 1000 *originalprice
    }
</script>
    <style>
        .selectcheckout{
            float: left ;
            width: 10%;
            height: 100%;
        }
        div.data{
            float: right;
            width: 65%;
        }
        img.img{
            float: left;
            max-width: 25% ;    
            max-height: 100%;
        }

        div.div{
            width: 100%;
            height: 40%;
            border: 2px solid black
        }
    </style>
@endsection