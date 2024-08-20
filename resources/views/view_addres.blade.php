@extends('header')
@section('content')
<table>
    <thead>
        <td>Addres:</td>
        <td>Edit:</td>
        <td>Delete:</td>
    </thead>
    <tr>
        <th colspan="3">
            <a href="{{ route('add_addres') }}" class="button"><button class="button">+ Add Addres</button></a>
        </th>
    </tr>
    @foreach ($data as $row)
        <tr>
            <td>
                <b>{{ $row->name_location }}</b><br>
                <b>Address 1:</b>{{ $row->addres_1 }}<br>
                <b>Address 2:</b>{{ $row->addres_2 }}<br>
                <b>City:</b>{{ $row->city }}<br>
                <b>State:</b>{{ $row->state }}<br>
                <b>Post code:</b>{{ $row->post_code }}<br>
            </td>
            <td>
                <a href="{{ route('edit_addres',['editaddres'=>$row->id]) }}" class="button"><button class="button">Edit</button></a>
            </td>
            <td>
                <a href="{{ route('delete_addres',['deleteaddres'=>$row->id]) }}" class="button"><button class="button">Delete</button></a>
            </td>
        </tr>
    @endforeach
</table>
<style>
    
    table{
        width: 100%;
    }
    .button{
        text-align: center;
        width: 100%;
        height: 124px;
    }
    table,th,td{
        border: 2px solid black;
    }
</style>
@endsection