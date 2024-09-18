@extends('header')
@section('content')
<div class="navigation">
    <a href="{{ route('delivery') }}" class="nav-link">Delivery</a>
    <a href="{{ route('view_pickup') }}" class="nav-link">Pick up</a>
    <a href="javascript:void(0)" style="color: darkblue" class="nav-link">History</a>
</div>

<div>
    <h1 style="text-align: center;margin: 3px">History</h1>
    <div class="button-container">
        <button type="button" class="button active" id="delivery">Delivery</button>
        <button type="button" class="button" id="pickup">Pick up</button>
        <button type="button" class="button" id="cart">Cart</button>
    </div>

    <div id="view"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        // Load default delivery data
        loadView(type='deliverys', element='#delivery');

        // Click handlers
        $("#delivery").click(function(){
            loadView('deliverys', this);
        });

        $("#pickup").click(function(){
            loadView('pickups', this);
        });

        $("#cart").click(function(){
            loadView('carts', this);
        });

        // Load view based on type
        function loadView(type , element) {
            
            if (type === 'deliverys') {
                    var url =  "{{ route('history_delivery','deliverys') }}"
                } else if (type === 'pickups') {
                    var url = "{{ route('history_delivery','pickups') }}"
                }else{
                    var url = "{{ route('history_delivery','carts') }}"
                }
            $.ajax({
                
                url:url,
                type: 'GET',
                datatype: 'json',
                success: function(response) {
                    $('#view').html(response.data);
                },
                error: function(xhr, status, error) {
                    window.alert('error');
                }
            });

            // Update button styles
            $('.button').removeClass('active');
            $(element).addClass('active');
        }
    });
</script>

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
    /* General styling */
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .button {
        flex-grow: 1;
        padding: 10px;
        text-align: center;
        background-color: aquamarine;
        border: none;
        cursor: pointer;
        border-radius: 5px 5px 0 0;
        transition: background-color 0.3s;
    }

    .button.active {
        background-color: aqua;
    }

    .button:not(:last-child) {
        margin-right: 5px;
    }

    #view {
        background-color: #f0f8ff;
        padding: 20px;
        border: 1px solid #ddd;
        border-top: none;
        min-height: 200px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 600px) {
        .button {
            padding: 8px;
        }
    }
</style>
@endsection
