@extends('header')
@section('content')
<form action="{{ route('f_checkout') }}" method="post">
    @csrf
    <div class="cart-container">
        @php
            $fornum = 0;
        @endphp
        @if (count($cart[0])===0)
            <div class="empty-cart">Your cart is empty</div>
            @php
                $i=0
            @endphp
        @else
        @php
            $row = $cart[0]
        @endphp
        @for ($i = 0; $i < count($row); $i++)
            <div class="cart-item">
                <div class="selectcheckout">
                    <input type="checkbox" name="{{ 'selectcheckout'.$i }}" value="{{ $row[$i]['c_id'] }}:{{ $row[$i]['id'] }}:{{ $row[$i]['p_total_quantity'] }}" id="" class="checkbox">
                </div>
                <img src="{{ asset('storage/'.$row[$i]['image']) }}" class="img" alt="">
                <div class="data">
                    <p class="product-name">Vegetable Name:<b>{{ $row[$i]['p_name'] }}</b></p>
                    <label for="">Quantity need</label>
                    <input type="number" min="100" step="100" value="{{ $row[$i]['c_quantity'] }}" name="{{ "quantity".$i }}" max="{{ $row[$i]['p_total_quantity'] }}" id="{{ "quantity".$i }}" oninput="calculate({{ $row[$i]['p_price']}},'{{ 'quantity'.$i }}','{{'price'.$i }}')" class="quantity-input">KG<br>
                    <label for="">Total Price: RM</label>
                    <input type="number" min="0.00" value="{{ $row[$i]['c_quantity']/1000 * $row[$i]['p_price'] }}" name="{{ "price".$i }}" id="{{ "price".$i }}" readonly class="price-input"><br>
                    <a href="{{ route('f_delete_cart',$row[$i]['c_id']) }}" class="button-link"><button type="button" class="button">Delete</button></a>
                </div>
            </div>
        @endfor 
        @endif
    </div>
    <div class="checkout-options">
        <div class="radio-container">
            <input type="radio" name="checkout" onchange="display()" value="delivery" id="delivery" checked class="radio">
            <label for="delivery">Delivery</label><br>
            <input type="radio" name="checkout" onchange="playhidden()" value="pick_up" id="pick_up" class="radio">
            <label for="pick_up">Pick Up</label>
        </div>
        <div id="hidden" class="address-select">
            <select name="addres" id="address-select" class="select">
                @if (count($addres[0]) === 0)
                    <option value="">--No address--</option>
                @else
                    @foreach ($addres[0] as $row)
                        <option value="{{ $row->id }}">{{ $row->name_location }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="checkout-button-container">
        <button type="submit" name="submit" class="checkout-button" value="{{ $i-1 }}">Checkout</button>
    </div>
</form>

<script>
    function display(){
        document.getElementById('hidden').style.display = '';
    }
    function playhidden(){
        document.getElementById('hidden').style.display = 'none';
    }
    function calculate(originalprice, quantityId, priceId){
        var valuequantity = document.getElementById(quantityId).value;
        document.getElementById(priceId).value = (valuequantity / 1000) * originalprice;
    }
</script>

<style>
    .cart-container {
        margin: 20px;
        margin-bottom: 10px;
    }

    .empty-cart {
        text-align: center;
        font-size: 18px;
        color: #666;
    }

    .cart-item {
        display: flex;
        border: 2px solid black;
        margin-bottom: 10px;
        padding: 10px;
        align-items: center;
    }

    .selectcheckout {
        margin-right: 10px;
    }

    .checkbox {
        width: 20px;
        height: 20px;
    }

    .img {
        max-width: 150px;
        max-height: 150px;
        margin-right: 10px;
    }

    .data {
        flex: 1;
    }

    .product-name {
        margin: 0;
    }

    .quantity-input, .price-input {
        width: 100%;
        box-sizing: border-box;
    }

    .button-link {
        text-decoration: none;
    }

    .button {
        width: 99%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        margin: 5px;
    }

    .checkout-options {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .radio-container {
        width: 45%;
    }

    .radio {
        margin-right: 5px;
        width: 20px;
        height: 20px;
    }

    .address-select {
        width: 45%;
    }

    #address-select {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 10px;
        margin-right: 15px;
        margin-top:10px;
    }

    .checkout-button-container {
        text-align: center;
    }

    .checkout-button {
        width: 100%;
        padding: 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
    }

    @media (max-width: 600px) {
        .cart-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .img {
            max-width: 100%;
            margin-bottom: 10px;
        }

        .radio-container, .address-select {
            width: 100%;
            margin-bottom: 10px;
        }

        .checkout-button {
            padding: 12px;
            font-size: 14px;
        }
    }
</style>
@endsection
