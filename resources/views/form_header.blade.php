@session('message')
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endsession 
<div>
    @yield('content')
</div>
<script>
    let submit_button_hide = 0
    document.getElementById('submit').onclick = submit_button_hide()
    function submit_button_hide(){
        if (submit_button_hide === 0 ) {
            document.getElementById('submit').type='hidden'
            submit_button_hide ++
        } else {
            document.getElementById('submit').type='submit'
            submit_button_hide --
        }
        setTimeout(submit_button_hide(), 30000);
    }
</script>
<style>
    body{
        background-color: aquamarine;
    }
    div{    
        max-width: 50%;
        border-radius: 25px ;
        text-align: center;
        margin-top: 50px;
        margin-left: 25%;
        margin-right: 25%;
        border: 4px solid rgb(209, 207, 207);
        background-color: white;
        padding: 10px;
    }
    form{
        padding: 25px;
        margin: 0%;
    }
    label{
        float: left;
        width: 40%;
    }
    #submit{
        width: 80%;
        border: 4px solid rgb(209, 207, 207);
        border-radius: 25px ;
        float:none;
        margin: 5px 
    }
    input{
        border-radius: 10px;
        width: 60%;
        float: right;
    }
    p{
        color:red;
    }
</style>
