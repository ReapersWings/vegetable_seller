@extends('form_header')
@section('content')
@if (session()->has('message'))
    <script>window.alert({{ session('message') }})</script>
@endif
<form action="{{ route('f_verify') }}" method="POST">
    @csrf
    <label for="">Email Verify:</label>
    <input type="text" name="token">
    <a type="button" id="a" href="javascript:void(0);">Send_token</a>
    <input type="submit" id="submit">
</form>
<style>
    a{
        width: 100%;
    }
</style>
<script>
    let calculate = 1 ;
    let button = 0 ;
    
    setInterval(function hide(){
        if (calculate === 5) {
            if (button === 0) {
                document.getElementById('a').href = "{{ route('send_token') }}"
                button+=1
            } else {
                document.getElementById('a').href = 'javascript:void(0);'
                button-=1
            }
            calculate -= 4
        }else{
            calculate ++
        }
    },6000);
</script>
@endsection
