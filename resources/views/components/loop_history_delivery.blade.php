@props(['deliverys'])
@if (count($deliverys) !== 0)
    @php
        $loop = "" ;
        $total_price = 0 ;
        $delivery = $deliverys[0]
    @endphp
    <table style="width:100%;border-top:2px solid black">
    @foreach ($delivery as $row)
        @if ($row['checkout_id'] !== $loop)
        <tr>
            <td style="border-bottom: 2px solid black">
                <div style="float: left;width:20%">
                    <h1>{{ $row['name_location'] }}</h1>
                </div>
                @php
                    $loop = $row['checkout_id'] ;
                @endphp
                <div style="width: 80%;float:left;overflow-y:scroll">
                    @foreach ($delivery as $rows)
                        @if ($rows === $loop)
                            <a href="{{ route('view_delivery_product',['id'=>$rows['c_id'],'type'=>'deliverys']) }}"><button>
                                <p style="margin: 0px;text-align: center">{{ $rows['p_name'] }}</p>
                                <p style="margin: 0px;text-align: center"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }}</b></p>
                            </button></a>
                        @endif
                    @endforeach
                </div>
                <div style="float: left;width:20%">
                    <h1>{{ $row['d_state'] }}</h1>
                </div>
            </td>
        </tr>
        @endif
    @endforeach
</table>
@else
    <h1 style="text-align: center;margin:0px;">-- Not History --</h1>
@endif
