@props(['data'])
@php
    $pickdata = $data ;
    $token = 0 ;
@endphp
@if ($data[0] !== null)
@foreach ($pickdata as $row)
    @if ($row['checkouts_id'] !== $token)
    @php
        $price = 0 ;
    @endphp

    <a href="{{ route('view_user_resit',['id'=>$row['checkout_id'],'pickup'=>'delivery']) }}">
    <div style="width: 99.7%;border:2px solid black;overflow:auto;border-collapse: collapse;color:black">
        <div style="width: 100%;">
            <p style="margin: 0px;text-align:center;height:50px;margin:0px;border-bottom:2px solid black">Token Pickup:<b style="font-size: 25px;">{{ $row['checkouts_id'] }}</b></p>
        </div>
        <div style="width: 25%;float: left;">
            <p style="margin: 0px">Location Delivery:</p>
            <h1 style="margin: 0px"><b>{{ $row['city'].",".$row['state'] }}</b></h1>
        </div>
        @php
            $token = $row['checkouts_id'];
        @endphp
        <div style="width:50%;float:left;border-left:2px solid black;border-right:2px solid black">
            <div style="width: 100%;"><p style="background-color: slategray;margin:0px;color:black;text-align:center;border-bottom:2px solid black"><b>Product:</b></p></div>
            <div style="overflow-y:scroll">
            
        @foreach ($pickdata as $rows)
            @if ($rows['checkouts_id'] === $token)
                <button style="padding:4px;border-radius: 10px;overflow:auto">
                    <div style="border:2px solid black;border-radius: 10px;overflow:auto">
                        <h1 style="margin: 0px">{{ $rows['p_name'] }}</h1>
                        <p style="color: black;margin: 0px"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }}g</b></p>
                    </div>
                </button>
                
                @php
                    $price +=$rows['c_total_price']
                @endphp
            @endif   
        @endforeach
        </div>
        </div>
        
        <div style=";width:15%;float:left;border-right:2px solid black">
            <p style="margin-top: 31px;margin-bottom:31px">Total Price:<b>RM{{ $price }}</b></p>
        </div>
        <div style="width:9%;float:left;">
            <h3 style="text-align: center">{{ $row['d_state'] }}</h3>
        </div>
    </div>
    </a>
   
    @endif 
@endforeach
<style>
        table{
            min-height: 50px;
            
        }
    </style>
@else
    <h1>No Results Found</h1>
@endif