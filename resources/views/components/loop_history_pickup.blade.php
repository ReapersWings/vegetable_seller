@props(['pickups'])
@if (count($pickups) !== 0)
    @php
        $loop = "" ;
        $total_price = 0 ;
        $pickup = $pickups[0]
    @endphp

    <table>
    @foreach ($pickup as $row)
        @if ($row['checkout_id'] !== $loop)
        <tr>
            <td>
                <div style="float: left;width:20%">
                    <h1>{{ $row['name_location'] }}</h1>
                </div>
                @php
                    $loop = $row['checkout_id'] ;
                @endphp
                <div style="width: 80%;float:left;overflow-y:scroll">
                    @foreach ($pickup as $rows)
                        @if ($rows === $loop)
                            <a href="{{ route('view_delivery_product',['id'=>$rows['c_id'],'type'=>'deliverys']) }}"><button>
                                <p style="margin: 0px;text-align: center">{{ $rows['p_name'] }}</p>
                                <p style="margin: 0px;text-align: center"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }}</b></p>
                            </button></a>
                        @endif
                    @endforeach
                </div>
                <div style="float: left;width:20%">
                    <h1>{{ $row['p_state'] }}</h1>
                </div>
            </td>
        </tr>
        @endif
    @endforeach
</table>
@else
    <h1 style="text-align: center;margin:0px;">-- Not History --</h1>
@endif