@extends('header')
@section('content')
    <a href="{{ route('delivery') }}">Delivery</a>
    <a href="{{ route('view_pickup') }}">Pick up</a>
    <a href="javascript:void(0)">History</a>
    <div>
        <h1 style="text-align: center;margin:3px">History</h1>
        <button type="button" class="button" id="delivery">Delivery</button>
        <button type="button" class="button" id="pickup">Pick up</button>
        <button type="button" class="button" id="cart">Cart</button>
        <div id="view">
        </div>  
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#delivery").click(function(){
                $.ajax({
                    url:"{{ route('history_delivery',['type'=>'deliverys']) }}",
                    type:'GET',
                    datatype:'json',
                    success:function(response){
                        $('#view').html(response.data);
                    },
                    error:function(xhr, status, error){
                        window.alert('error');
                    }
                })
            })
            $("#pickup").click(function(){
                $.ajax({
                    url:"{{ route('history_delivery',['type'=>'pickups']) }}",
                    type:'GET',
                    datatype:'json',
                    success:function(response){
                        $('#view').html(response.data);
                    },
                    error:function(xhr, status, error){
                        window.alert('error');
                    }
                })
            })
            $("#cart").click(function(){
                $.ajax({
                    url:"{{ route('history_delivery',['type'=>'carts']) }}",
                    type:'GET',
                    datatype:'json',
                    success:function(response){
                        $('#view').html(response.data);
                    },
                    error:function(xhr, status, error){
                        window.alert('error');
                    }
                })
            })
        })
    </script>
    
    
    <style>
        #view{
            background-color: aqua;
            width: 100%;
        }
        .button{
            width: 33.1%;
            border: 0px;
            background-color: aqua;
            margin: 0px;
            border-radius: 5px;
            border-collapse: collapse;
        }
    </style>
@endsection
