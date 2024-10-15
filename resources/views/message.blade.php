@extends('admin_header')
@section('content')
@if (count($data) !== 0)
    <table>
        <tr>
            <th colspan="3">Message refund</th>
        </tr>
        <tr>
            <th>User</th>
            <th>Message</th>
            <th>date/time</th>
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row['users.name'] }}</td>
                <td>{{ $row['messages.message'] }}</td>
                <td>{{ $row['messages.created_at'] }}</td>
            </tr>
        @endforeach
    </table>
@else
    <h1 class="no-delivery">--No Vegetables are currently being Pick up--</h1>
@endif
    
@endsection