<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $price=0 ;
    @endphp
    <table>
        <tr>
            <th colspan="2"><h1>Resit : {{ $data['checkouts_id'] }}</h1></th>
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>
                    {{ $row['p_name'] }}
                </td>
                <td>
                    RM{{ $row['c_total_price']."/".$row['c_quantity'] }}g
                </td>
            </tr>
            @php
                $price+=$row['c_total_price'];
            @endphp
        @endforeach
        <tr>
            <th><p><b>Total refund : {{ $price }}</b></p></th>
        </tr>
    </table>
    <p>Have been funding ... </p>
</body>
</html>