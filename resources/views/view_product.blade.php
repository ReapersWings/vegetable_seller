@extends('header')
@section('content')
<div class="div">
    <img src="{{ asset('storage/'.$data->image) }}" alt="" class="img">
    <h1 class="h1">Vegetable:<br>{{ $data->p_name }}</h1>
    <h4>Storage:{{ $data->p_total_quantity }}</h4>
    <p><b>RM{{ $data->p_price }}</b>/kg</p>
    <form action="{{ route('f_add_cart') }}" method="post">
        @csrf
        <input type="number" min="100" step="100" name="c_quantity" min="0" value="1000">G<br>
        @error('c_quantity')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit" name="product_id" value={{ $data->id }}>Add to Cart</button>
    </form>
</div>
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