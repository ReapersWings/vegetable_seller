@extends('header')
@section('content')
<div class="div">
    <img src="{{ asset('storage/'.$data->image) }}" alt="" class="img">
    <h1 class="h1">Vegetable:<br>{{ $data->p_name }}</h1>
    <h4>Storage:{{ $data->p_total_quantity }}</h4>
    <p>RM<b id="price">{{ $data->p_price }}</b>/kg</p>
    <form action="{{ route('f_add_cart') }}" method="post">
        @csrf
        <button type="button" onclick="minusgram(1000)">-1KG</button>
        <button type="button" onclick="minusgram(100)">-100G</button>
        <input type="number" min="100" step="100" name="c_quantity" min="0" id="gram" value="1000" oninput="culcelate({{ $data->p_price }})" readonly>G
        <button type="button" onclick="addgram(100)">+100G</button>
        <button type="button" onclick="addgram(1000)">+1KG</button><br>
        <button type="button" onclick="resetgram()">Reset</button><br>
        @error('c_quantity')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit" name="product_id" value={{ $data->id }}>Add to Cart</button>
    </form>
</div>
<script>
    function culcelate(originalprice){
        let pricevalue = document.getElementById('price')
        let gramvalue = document.getElementById('gram').value
        pricevalue.innerHTML= (gramvalue / 1000 )*originalprice
    }
    function resetgram(){
        document.getElementById('gram').value=1000
    }
    function addgram(pustgramvalue){
        let gvalue = document.getElementById('gram')
        console.log(gvalue.value);
        gvalue.value=parseInt(gvalue.value)+pustgramvalue
    }
    function minusgram(gramvalue){
        let gvalue = document.getElementById('gram')
        if (gvalue.value > gramvalue) {
            console.log(gvalue.value);
            gvalue.value=parseInt(gvalue.value)-gramvalue
        }
    }
</script>
<style>
    h1.h1{
        border: 2px solid black
    }
    .img{
        max-height: 450px;
        max-width: 100%;
    }
    div.div{
        text-align: center;
    }
</style>
@endsection