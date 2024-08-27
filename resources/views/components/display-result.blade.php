@props(['row','data'])
    {{ $id=""  }}
    @if (count($row) !== 0)
        @for ($i = 0; $i < count($row); $i++)
            @if ($row[$i]['checjouts_id']!==$id)
                <tr>
                    <td>
                        <h5 class="text">Token delivery:{{ $row[$i]['checjouts_id'] }}</h5>
                        <p class="text">Your addres: <a href="{{ route('view_addres') }}">{{ $row[$i]['name_location'] }}</a></p>
                        @php
                            $id = $row[$i]['checjouts_id'];
                        @endphp
                        <p class="text"><ins><b>Product delivery:</b></ins></p>
                        @for ($ii = 0; $ii < count($row); $ii++)
                            @if ($row[$ii]['checjouts_id']===$id)
                            <a href="{{ route('product_data',$row[$i]['product_id']) }}"><button class="product">
                                <p class="text">{{ $row[$ii]['p_name'] }}</p>
                                <p class="text">Quantity:{{ $row[$i]['c_quantity'] }}</p>
                            </button></a>
                            @endif    
                        @endfor
                    </td>
                    @if ($data === "Not Delivery be on the way!")
                    <td>
                        <form action="{{ route('f_delivery') }}" method="post">
                            @csrf
                            <button type="submit" value="{{ $row[$i]['checjouts_id'] }}">Successful</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endif
        @endfor
    @else
        <tr><td><p style="text-align: center"><b>--{{ $data }}--</b></p></td></tr>
    @endif