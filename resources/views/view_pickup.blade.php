@extends('header')
@section('content')
<div>
    <div class="navigation">
        <a href="{{ route('delivery') }}" class="nav-link">Delivery</a>
        <a href="javascript:void(0)" style="color: darkblue" class="nav-link">Pick up</a>
        <a href="{{ route('history') }}" class="nav-link">History</a>
    </div>
    {{ $example="" }}
    @if (count($data) !== 0)
    <div class="order-container">
        @foreach ($data as $row)
            @if ($row['checkout_id'] !== $example)
            <div class="order-item">
                <h1 class="order-token">{{ $row['c_token_pick_up'] }}</h1>
                @php
                    $totalprice = 0;
                    $example = $row['checkout_id'];
                @endphp
                @foreach ($data as $rows)
                    @if ($rows['checkout_id'] === $example)
                        <a href="{{ route('view_product_delivery',['id'=>$row['c_id'],'type'=>'pickup']) }}">
                            <button class="product-button">
                                <p class="text">Vegetable name: <b>{{ $rows['p_name'] }}</b></p>
                                <p class="text"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }} KG</b></p>
                            </button>
                        </a>
                        @php
                            $totalprice += $rows['c_total_price'];
                        @endphp
                    @endif
                @endforeach
                <h4 class="text">Total Price: <b>RM{{ $totalprice }}</b></h4>
                <h3 class="text">Pick-up before:</h3>
                <h2 class="text">{{ $row['p_expire_date'] }}</h2>
            </div>
            @endif
        @endforeach
    </div>
    <div class="contact-info">
        <p>You need to contact the seller for refunds</p>
        <p>Phone: 012-3456789</p>
    </div>
    @endif
</div>

<style>
    .navigation {
        text-align: center;
        margin-bottom: 20px;
    }
    .nav-link {
        margin: 0 15px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }
    .nav-link:hover {
        text-decoration: underline;
    }
    .order-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Ensures equal space between items */
        padding: 5px;
        border: 2px solid black;
    }
    
    .order-item {
        flex: 0 0 48%; /* 48% width to allow for 2 items per row with some space */
        border: 2px solid black;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        text-align: center;
    }
    
    .order-token {
        font-size: 24px;
        font-weight: bold;
    }

    .product-button {
        width: 100%;
        background-color: #f5f5f5;
        border: 1px solid black;
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 10px;
    }

    .text {
        margin: 0;
        text-align: center;
    }

    .contact-info {
        text-align: center;
        margin-top: 20px;
    }

    /* Responsive for smaller screens */
    @media (max-width: 768px) {
        .order-item {
            flex: 0 0 48%;
        }
    }

    @media (max-width: 480px) {
        .order-item {
            flex: 0 0 100%; /* Full width on very small screens */
        }
    }
</style>
@endsection
