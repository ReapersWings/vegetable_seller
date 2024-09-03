@extends('form_header')
@section('content')
<form action="{{ route('f_verify_email') }}" method="POST">
    @csrf
    <h1>Please verify your email</h1>
    <label for="">Email Verify:</label>
    <input type="text" name="token">
    <button type="submit" value="{{ session('email') }}" name="email" id="submit" >Submit</button>
</form>
<form action="{{ route('f_inputemail') }}" method="post">
    @csrf
    <button  id="a" type="submit" name="email" value="{{ session('email') }}">Resend Email</button>
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
                document.getElementById('a').style.color='grey'
                button+=1
            } else {
                document.getElementById('a').style.color='black'
                button-=1
            }
            calculate -= 4
        }else{
            calculate ++
        }
    },6000);
</script>
@endsection
