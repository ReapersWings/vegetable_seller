@props(['data'])
@php
    $pickdata = $data ;
    $token = 0 ;
@endphp
@if ($data[0] !== null)
@foreach ($pickdata as $row)
    @if ($row['c_token_pick_up'] !== $token)
    @php
        $price = 0 ;
    @endphp
    <div style="width: 100%;border:2px solid black;overflow:auto">
        <div style="width: 25%;float: left;border-right:2px solid black">
            <p style="margin: 0px">Token Pickup:</p>
            <h1 style="margin: 0px">{{ $row['c_token_pick_up'] }}</h1>
            <br>
            <p style="margin: 0px">Expire Date:</p>
            <h1 style="margin: 0px">{{ $row['p_expire_date'] }}</h1>
        </div>
        @php
            $token = $row['c_token_pick_up'];
        @endphp
        <div style="width:50%;float:left;overflow-y:scroll;min-height: 146px">
        @foreach ($pickdata as $rows)
            @if ($rows['c_token_pick_up'] === $token)
                <div style="width:25%;border:2px solid black">
                    <h1 style="margin: 0px">{{ $rows['p_name'] }}</h1>
                    <p style="color: black;margin: 0px"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }}g</b></p>
                </div>
                @php
                    $price +=$rows['c_total_price']
                @endphp
            @endif   
        @endforeach
        </div>
        <div style="border-left:2px solid black;width:15%;float:left;height:146px;">
            <p>Total Price:</p><br>
            <h3><b>RM{{ $price }}</b></h3>    
        </div>
    </div>
    <style>
        table{
            min-height: 50px
        }
    </style>
    @endif
@endforeach
@else
    <h1>No Results Found</h1>
@endif