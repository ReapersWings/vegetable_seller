@extends('header')
@section('content')
    <table>
        <thead>
            <th>Preparing</th>
        </thead>
        @php
            $id = "";
            
            $row=$preparing[0] ;
            //dd($row);
        @endphp
        @for ($i = 0; $i < count($row); $i++)
        @php
            $id = $row[$i]['checjouts_id'];
        @endphp
        @if ($row[$i]['checjouts_id']===$id)
            <tr>
                <td>
                    <h5 class="text">{{ $row[$i]['checjouts_id'] }}</h5>
                    <p class="text">{{ $row[$i]['name_location'] }}</p>
                    @for ($ii = 0; $ii < count($row); $ii++)
                        @if ($row[$ii]['checjouts_id']===$id)
                            <p class="text">{{ $row[$ii]['p_name'] }}</p>
                        @endif    
                        
                    @endfor
                </td>
            </tr>
        @endif

        @endfor
    </table>
    <table>
        <thead>
            <th>On The Way</th>
        </thead>
        @foreach ($ontheway as $row)
            <tr>
                <td>
                    
                </td>
            </tr>
        @endforeach
    </table>
    <table>
        <thead>
            <th>History</th>
        </thead>
        @foreach ($history as $row)
            <tr>
                <td>

                </td>
            </tr>
        @endforeach
        <tr></tr>
    </table>
    <style>
        .text{
            margin:0px;
        }
        td{
            border: 2px solid black;
        }
    </style>
@endsection