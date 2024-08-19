@extends('header')
@section('content')
    <h1>Vegetables or fruits seller</h1>
    @foreach ($data as $row)
    
        <a href="">
            <button class="product">
                <div class="border">
                    <img src="{{ asset('storage/'.$row->image) }}" alt="" class="image">
                    <h5>{{ $row->p_name }}</h5>
                    <p><b>{{ $row->p_price }}</b></p>
                    <p><b>{{ $row->p_total_quantity }}</b></p>
                </div> 
            </button>
        </a>
    @endforeach
    {{ $data->links() }}
    <style>
        .image{
            max-width: 100%;
            height: 60%;
        }
        .product{
            width: 20%;
            height: 300px;
        }
        .border{
            border: 2px solid black
        }
    </style>
@endsection