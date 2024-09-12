@props(['pickups'])

@if (count($pickups) !== 0)
    @php
        $currentCheckoutId = "" ;
    @endphp

    <table style="width:100%; border-top:2px solid black;">
    @foreach ($pickups as $row)
        @if ($row['checkout_id'] !== $currentCheckoutId)
            @php
                $currentCheckoutId = $row['checkout_id'];
                $totalPrice = 0;
            @endphp
            <tr>
                <td style="border-bottom: 2px solid black; padding: 10px;">
                    <div style="float: left; width: 20%;">
                        <h1>{{ $row['name_location'] }}</h1>
                    </div>

                    <div style="width: 60%; float: left; overflow-y: auto;">
                        @foreach ($pickups as $rows)
                            @if ($rows['checkout_id'] === $currentCheckoutId)
                                @php
                                    $totalPrice += $rows['c_total_price'];
                                @endphp
                                <a href="{{ route('view_delivery_product', ['id' => $rows['c_id'], 'type' => 'pickups']) }}">
                                    <button style="display: block; width: 100%; padding: 5px; margin-bottom: 5px;">
                                        <p style="margin: 0px; text-align: center;">{{ $rows['p_name'] }}</p>
                                        <p style="margin: 0px; text-align: center;"><b>RM{{ $rows['c_total_price'] }}/{{ $rows['c_quantity'] }}</b></p>
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <div style="float: left; width: 20%;">
                        <h1>{{ $row['p_state'] }}</h1>
                        <h3>Total: RM{{ $totalPrice }}</h3>
                    </div>
                </td>
            </tr>
        @endif
    @endforeach
    </table>
@else
    <h1 style="text-align: center; margin: 0;">-- No History Available --</h1>
@endif
