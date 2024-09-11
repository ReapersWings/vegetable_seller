@props(['row','data'])
    {{ $id=""  }}
    
    @if (count($row) !== 0)
        @for ($i = 0; $i < count($row); $i++)
            @if ($row[$i]['checkouts_id']!==$id)
            @php
                $total_price =  0
            @endphp
                <tr>
                    <td>
                        <h4 class="text" style="text-align: center">Token delivery:{{ $row[$i]['checkouts_id'] }}</h4>
                        @php
                            $id = $row[$i]['checkouts_id'];
                        @endphp
                        <div style="border:2px solid black;border-radius: 15px ;overflow: auto;background-color:grey;padding:10px">
                            <p class="text" style="text-align: center"><ins><b>Vegetable delivery:</b></ins></p>
                            @for ($ii = 0; $ii < count($row); $ii++)
                                @if ($row[$ii]['checkouts_id']===$id)
                                    <a href="{{ route('view_product_delivery',['id'=>$row[$ii]['c_id'],'type'=>'delivery']) }}"><button class="product">
                                        <p class="text"><b>{{ $row[$ii]['p_name'] }}</b></p>
                                        <p class="text">Quantity:<b>{{ $row[$ii]['c_quantity'] }}G</b></p>
                                        <p class="text">Total price: <b>RM{{ $row[$ii]['c_total_price'] }}</b></p>
                                    </button></a>
                                    @php
                                        $total_price+=$row[$ii]['c_total_price']
                                    @endphp
                                @endif    
                            @endfor
                            <p class="text" style="float: right;width:50%">Your addres: <a href="{{ route('view_addres') }}">{{ $row[$i]['name_location'] }}</a></p>
                            <p class="text" style="float: left;width:50%">Total price : <b>RM{{ $total_price }}</b></p>
                        </div>
                        
                    </td>
                    @if ($data === "Not Delivery be on the way!")
                    <td>
                        <form action="{{ route('f_delivery') }}" method="post">
                            @csrf
                            <button type="submit" value="{{ $row[$i]['checkouts_id'] }}">Successful</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endif
        @endfor
    @else
        <tr><td><p style="text-align: center"><b>--{{ $data }}--</b></p></td></tr>
    @endif