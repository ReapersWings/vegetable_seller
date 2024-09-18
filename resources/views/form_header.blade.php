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
    body {
    background-color: aquamarine;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

div {
    max-width: 90%; /* Adjusted for mobile */
    border-radius: 25px;
    text-align: center;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    border: 4px solid rgb(209, 207, 207);
    background-color: white;
    padding: 10px;
}

form {
    padding: 15px; /* Reduced padding for small screens */
    margin: 0;
}

label {
    float: left;
    width: 100%; /* Full width on mobile */
    margin-bottom: 10px;
    text-align: left;
}

input[type="text"], input[type="password"] ,input[type="number"]{
    width: 100%; /* Full width for inputs */
    border-radius: 10px;
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
}

#submit {
    width: 100%; /* Full width for the submit button */
    border: 4px solid rgb(209, 207, 207);
    border-radius: 25px;
    padding: 10px;
    background-color: #f2f2f2;
    margin-top: 15px;
}

button {
    width: 100%; /* Full width for the button */
    border: 4px solid rgb(209, 207, 207);
    border-radius: 25px;
    padding: 10px;
    margin-top: 10px;
    background-color: #f2f2f2;
}

p {
    color: red;
    text-align: left;
}

@media (min-width: 768px) {
    /* Larger screens */
    div {
        max-width: 50%; /* Restore original width for larger screens */
    }
}

</style>
