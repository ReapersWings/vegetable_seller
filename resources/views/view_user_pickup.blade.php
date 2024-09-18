@extends('admin_header')
@section('content')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
<form action="" method="get">
    <input type="text" name="input" id="search" placeholder="Search...">
</form>

<h1 style="text-align: center">User Pick-up List</h1>

<div id="result_display">
    <x-loop_user_pickups :data=$data />
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $('#search').on('input', function(){
    //console.log("Input changed: ", $(this).val());  // Debugging statement

    $.ajax({
        url: '{{ route("loop_pickup") }}',
        type: 'POST',
        datatype: 'json',
        data: {
            input: $(this).val(),
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
});


</script>

@endsection