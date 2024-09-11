@extends('header')
@section('content')
<div class="container">
    <a href="{{ route('add_addres') }}" class="button-link">
        <button class="button add-address-btn">+ Add Address</button>
    </a>
    
    <table class="address-table">
        <thead>
            <tr>
                <th>Addres:</th>
                <th>Edit:</th>
                <th>Delete:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>
                        <b>{{ $row->name_location }}</b><br>
                        <b>Address 1:</b> {{ $row->addres_1 }}<br>
                        <b>Address 2:</b> {{ $row->addres_2 }}<br>
                        <b>City:</b> {{ $row->city }}<br>
                        <b>State:</b> {{ $row->state }}<br>
                        <b>Post code:</b> {{ $row->post_code }}<br>
                    </td>
                    <td>
                        <a href="{{ route('edit_addres',['editaddres'=>$row->id]) }}" class="button-link">
                            <button class="button">Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('delete_addres',['deleteaddres'=>$row->id]) }}" class="button-link">
                            <button class="button">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .container {
        padding: 20px;
        background-color: #f9f9f9;
    }

    .button-link {
        text-decoration: none;
    }

    .button {
        display: inline-block;
        width: 100%;
        height: 40px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        line-height: 40px;
        margin: 5px 0;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #0056b3;
    }

    .add-address-btn {
        width: 100%;
        margin: 0;
    }

    .address-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .address-table th, .address-table td {
        border: 2px solid black;
        padding: 10px;
        text-align: center;
    }

    .address-table th {
        background-color: #f2f2f2;
    }

    @media (max-width: 600px) {
        .address-table {
            font-size: 14px;
        }

        .address-table th, .address-table td {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        .address-table th, .address-table td {
            border: none;
            padding: 8px;
            text-align: left;
        }

        .address-table thead {
            display: none;
        }

        .address-table tr {
            margin-bottom: 10px;
            display: block;
            border-bottom: 1px solid #ddd;
        }

        .button {
            height: 35px;
            font-size: 14px;
        }
    }
</style>
@endsection
