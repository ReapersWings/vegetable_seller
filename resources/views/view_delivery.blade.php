@extends('header')
@section('content')
    <table>
        <thead>
            <th>Preparing</th>
        </thead>
        @foreach ($preparing as $row)
            <tr>
                <td>

                </td>
            </tr>
        @endforeach
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
@endsection