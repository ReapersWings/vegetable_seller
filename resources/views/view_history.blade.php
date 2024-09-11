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
            $('#pickup').css('background-color','aquamarine')
            $('#cart').css('background-color','aquamarine')
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
                $('#delivery').css('background-color','aqua')
                $('#pickup').css('background-color','aquamarine')
                $('#cart').css('background-color','aquamarine')
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
                $('#delivery').css('background-color','aquamarine')
                $('#pickup').css('background-color','aqua')
                $('#cart').css('background-color','aquamarine')
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
                $('#pickup').css('background-color','aquamarine')
                $('#delivery').css('background-color','aquamarine')
                $('#cart').css('background-color','aqua')
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
            border-collapse: collapse;
            border-top-left-radius: 5px ;
            border-top-right-radius: 5px;
        }
    </style>
@endsection
