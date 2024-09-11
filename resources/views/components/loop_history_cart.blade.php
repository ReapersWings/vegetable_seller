@props(['carts'])
@if (count($carts) !== 0)
    
    <table  style="width:100%;border-top:2px solid black"  >
    @foreach ($carts as $row)
        @if ($row['c_state'] === 'delete')
            <tr>
                <td style="border-bottom: 2px solid black">
                    <img src="{{ asset('storage/'.$row['image']) }}" alt="" style="max-height: 125px;float:left;max-width:30%">
                    <div style="float:left;width:30%">
                        <h1 style="margin: 0px;">{{ $row['p_name'] }}</h1>
                        <p style="">Total Price :<b>RM{{ $row['c_quantity']/1000 * $row['p_price']  }}</b></p>
                        <p>total quantity:<b>{{ $row['c_quantity'] }}G</b></p>
                    </div>
                    <form action="{{ route('f_add_cart') }}" style="float: right;width:10%;margin:0px;" method="post">
                        @csrf
                        <button type="submit" style="height: 125px;width:100%;" value="{{ $row['c_id'].':'.$row['product_id'] }}" name="c_id">Add to Cart</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
    </table>
@else
    <h1 style="text-align: center;margin:0px;">-- Not History --</h1>
@endif