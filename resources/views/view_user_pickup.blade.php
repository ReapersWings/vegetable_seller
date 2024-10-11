@extends('admin_header')
@section('content')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
<a href="{{ route('admin_main') }}"><button style="width: 100%;border:4px solid rgb(209, 207, 207);border-radius:25px;height:30px;margin-bottom:10px">Back</button></a>
<form action="" method="get">
    <input type="text" name="searchpickupinput" id="searchpickup" placeholder="Token pickup..." style="">
    <input type="text" name="searchdeliveryinput" id="searchdelivery" placeholder="Token delivery..." style="display:none">
</form>
<p style="width: 49%;float:left;color:red;" id="pickup"><b style="float: right;text-decoration: underline;">Pickup</b></p>
<p style="width: 49%;float:right;" id="delivery"><b style="text-decoration: underline;">Delivery</b></p>
<h1 style="text-align: center" id="heading">User List</h1>

<div id="result_display">
    <x-loop_user_pickups :data=$data />
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
const functionajax = function(inputvalue,target){
    if (inputvalue === 'pickup') {
        var valueurl = '{{ route("loop_pickup","pickup") }}'
    } else {
        var valueurl = '{{ route("loop_pickup","delivery") }}'
    }
    $.ajax({
        url: valueurl ,
        type: 'POST',
        datatype: 'json',
        data: {
            input: $(target).val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(response){
            //console.log("Response received: ", response);  // Debugging statement
            $('#result_display').html(response.data);
        },
        error: function(xhr, status, error){
            //console.error("AJAX error: ", status, error);  // Debugging statement
            $('#result_display').html("<h1>No Results Found</h1>");
        }
    });
}
$('#pickup').on('click',function(){
    functionajax('pickup','#searchpickup')
    $('#pickup').css('color','red')
    $('#delivery').css('color','black')
    $('#searchpickup').css('display','')
    $('#searchdelivery').css('display','none')
})
$('#delivery').on('click',function(){
    functionajax('delivery','#searchpickup')
    $('#pickup').css('color','black')
    $('#delivery').css('color','red')
    $('#searchpickup').css('display','none')
    $('#searchdelivery').css('display','')
})
$('#searchpickup').on('change', function(){
    functionajax('pickup','#searchpickup')
});
$('#searchdelivery').on('change', function(){
    functionajax('delivery','#searchdelivery')
});


</script>
<style>
    #pickup:active,#delivery:active{
        color: red;
        
    }
    #result_display{
        padding: 4px;
        border: 4px solid #ccc;
        border-radius: 10px;
    }
    input{
        width: 100%; /* Full width for inputs */
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
    }
</style>
@endsection