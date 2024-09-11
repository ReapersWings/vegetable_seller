@extends('header')
@section('content')
    <div class="navigation">
        <a href="javascript:void(0)" style="color: darkblue" class="nav-link">Delivery</a>
        <a href="{{ route('view_pickup') }}"  class="nav-link">Pick up</a>
        <a href="{{ route('history') }}" class="nav-link">History</a>
    </div>
    @if (count($preparing[0]) === 0 && count($ontheway[0]) === 0)
        <h1 class="no-delivery">--No Vegetables are currently being delivered--</h1>
    @else
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Preparing</th>
                    </tr>
                </thead>
                <x-display-result :row="$preparing[0]" data="No delivery is being prepared!" />
            </table>
            
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2">On The Way</th>
                    </tr>
                </thead>
                <x-display-result :row="$ontheway[0]" data="No delivery is on the way!" />
            </table>
        </div>
        <div class="contact-info">
            <p>If you need a refund, please contact the seller:</p>
            <p>Phone: 012-3456789</p>
        </div>
    @endif

    <style>
        .navigation {
            text-align: center;
            margin-bottom: 20px;
        }
        .nav-link {
            margin: 0 15px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
        .no-delivery {
            text-align: center;
            color: #ff6f61;
        }
        .table-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .table {
            width: 45%;
            border: 2px solid black;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background-color: grey;
            color: white;
            padding: 10px;
            text-align: center;
        }
        td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
        }
        .contact-info {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            .table-container {
                flex-direction: column;
                align-items: center;
            }
            .table {
                width: 90%;
            }
            .contact-info {
                font-size: 12px;
            }
        }
    </style>
@endsection
