@extends('header')

@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
    <title>Document</title>
    <h1 style="width: 100%; text-align: center;">VegeSel</h1>
<div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
    <select name="select" id="select" style="width: 85%; height: 40px; padding: 5px; font-size: 16px;margin-left:4px">
        <option value="date">Date</option>
        <option value="name">Name</option>
        <option value="quantity">Quantity</option>
        <option value="price">Price</option>
    </select>
    <button id="checkboxid" style="width: 12%; height: 40px; display: flex; justify-content: center; align-items: center; padding: 0;margin-right:4px">
        <i class="material-icons" style="font-size: 20px;" id="iconimage">arrow_upward</i>
    </button>
</div>

<style>
    /* Responsive design */
    @media only screen and (max-width: 600px) {
        h1 {
            font-size: 24px;
        }

        select {
            width: 80%; /* Adjust width for smaller screens */
            height: 40px;
            font-size: 14px;
        }

        button {
            width: 18%; /* Adjust button size */
            height: 40px;
        }

        i {
            font-size: 16px; /* Adjust icon size */
        }
    }
</style>

    <div id="content">
       <x-loop_mainpage_product :data=$data />
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
    let listvalue = 1 ;
    $('#checkboxid').on('click',function(){
        if (listvalue === 1) {
            listvalue-=1
            functionajax('#select')

            $('#iconimage').html("arrow_downward")
        } else {
            listvalue+=1
            functionajax('#select')
            $('#iconimage').html("arrow_upward")
        }
        
    })
    const functionajax = function(target){
        console.log(listvalue)
        if (listvalue === 0 ) {
            urlvalue='{{ route("loop_main","sequence") }}'
            console.log('sequence')
        } else {
            urlvalue='{{ route("loop_main","Reverse") }}'
            console.log('Reverse')
        }
        console.log(urlvalue)
        $.ajax({
            url: urlvalue ,
            type: 'POST',
            datatype: 'json',
            data: {
                input: $('#select').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                console.log("Response received: ", response);  // Debugging statement
                $('#content').html(response.data);
            },
            error: function(xhr, status, error){
                console.error("AJAX error: ", status, error);  // Debugging statement
                $('#content').html("<h1>No Results Found</h1>");
            }
        });
    }
    $('#select').on('change',function(){
        functionajax('#select')
    })
    </script>

    <style>
        .product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 20px;
    gap: 20px; /* Ensure consistent gap between products */
}

.product-link {
    text-decoration: none;
    flex: 1 1 calc(25% - 20px); /* Four products per row with a 20px gap */
    margin-bottom: 20px;
    box-sizing: border-box; /* Ensure padding and borders are included in the element's total width and height */
}

.product {
    width: 100%;
    height: 300px;
    background-color: white;
    border: none;
    cursor: pointer;
    transition: transform 0.2s;
}

.product:hover {
    transform: scale(1.05);
}

.product-border {
    border: 2px solid black;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
}

.product-image {
    max-width: 100%;
    height: 60%;
    object-fit: cover;
}

h5, p {
    margin: 5px 0;
    font-size: 14px;
}
svg{
    width: 5%;
    height: 5%;
}
path{
    width: 200%;
    height: 200%;   
}
/* Mobile Responsive Layout */
@media (max-width: 768px) {
    .product-link {
        flex: 1 1 calc(50% - 20px); /* Two products per row on tablets */
    }
}

@media (max-width: 480px) {
    .product-link {
        flex: 1 1 calc(100% - 20px); /* One product per row on small screens */
    }
}

    </style>
@endsection
