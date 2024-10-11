@extends('admin_header')
@section('content')
@php
    function displaystate($row){
        switch ($row) {
            case 'readying':
                echo '<h1 style="color:red" class="state">'.$row.'</h1>';
                break;
            
            case 'successful':
                echo '<h1 style="color:green" class="state">'.$row.'</h1>';
                break;
            
            default:
                echo '<h1 style="color:yellow" class="state">'.$row.'</h1>';
                break;
        }
    }
@endphp
<div style="border-collapse: collapse">
    <a href="{{ route('user_pickup') }}"><button style="width: 100%;border:4px solid rgb(209, 207, 207);border-radius:25px;height:30px;margin-bottom:10px">Back</button></a>
    <h1 style="border-bottom:2px solid black">{{ $data[0]['checkouts_id'] }}</h1>
    @if ($type === 'pickup')
        {{ displaystate($data[0]['p_state']) }}
    @else
        {{ displaystate($data[0]['d_state']) }}
    @endif
    
    <div style="border: 2px solid black;overflow:auto">
        <div style="float: left;width:50%;">
        <p style="margin:0px">Buyer data:</p>
        <p style="margin:0px"><b>{{ $data[0]['name'] }}</b></p>
        <p style="margin:0px"><b>{{ $data[0]['email'] }}</b></p>
        <p style="margin:0px"><b>{{ $data[0]['f_name']."".$data[0]['l_name'] }}</b></p>
        <p style="margin:0px"><b>{{ $data[0]['gender'] }}</b></p>
        <p style="margin:0px"><b>{{ $data[0]['email_verified_at'] }}</b></p>
    </div>
    <div style="float: left;width:49.5%;border-left:2px solid black">
        @if ($type === 'pickup')
            <h1>Token pick up : {{ $data[0]['c_token_pick_up'] }}</h1>
        @else
            <h1> Address:</h1>
            <p>{{ $data[0]['name_location'] }}</p>
            <p>{{ $data[0]['addres_1'] }}</p>
            <p>{{ $data[0]['addres_2'] }}</p>
            <p>{{ $data[0]['city'] }}</p>
            <p>{{ $data[0]['state'] }}</p>
            <p>{{ $data[0]['post_code'] }}</p>
        @endif
    </div>
    </div>
</div>
<style>
    h1{
        text-align: center;
    }
    .state{
        border: 4px solid black;
        margin-top:0px;
        padding-top:15px;
        padding-bottom: 15px;
        background-color:whitesmoke
    }
</style>
<div style="width: 99%;padding:6px">
    @foreach ($data as $row)
        <div style="float: left;width:23%;border:2px solid black;border-radius:25px;padding:15px;text-align:center">
            <img src="{{ asset('storage/'.$row['image']) }}" alt="" style="max-width: 80%;max-height:250px">
            <h1 style="margin: 0px;text-align:center">
                {{ $row['p_name'] }}
            </h1>
            <p><b>
                RM{{ $row['c_total_price'] }}/{{ $row['c_quantity'] }}G
            </b></p>
        </div>      
    @endforeach
</div>
@endsection