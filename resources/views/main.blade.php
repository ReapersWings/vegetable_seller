@extends('header')
@section('content')
    <h1>Vegetables or fruits seller</h1>
    @foreach ($data as $row)
        <a href="{{ route('product_data',['data'=>$row->id]) }}" style="text-decoration-line: none">
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
            width: 24.7%;
            height: 300px;
        }
        div.border{
            border: 2px solid black
        }
        nav{
            size: 25px;
            text-align: center;
        }
        svg{
            width: 2%;
            height: 2%;
        }
        p{
            margin: 0%;
        }
        nav > div > span{
            width: 44.9%;
            text-decoration: underline;
            color: gray;
        }
        nav > div > a{width:45%;}
        nav > div > a:visited{color: black;}
        div>div>p{float: left;}
        nav{
            overflow:auto;
            border: 2px solid black;
        }
        nav>div>div>span{float: right;}
        nav>div>div>span>span{
            color: gray ;
            text-decoration: underline;
        }
        nav>div>div>span>a:visited{color: black}
        nav>div{overflow:auto;border: 2px solid black}
        nav>div>div{width: 49.9%;overflow: auto;float: left}
    </style>
@endsection