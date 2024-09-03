@session('message')
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endsession 
<header>
        <div style="float: left;width:30%">
            <img src="{{ asset('storage/images/') }}" alt="">
            <a href="{{ route('main') }}"><button>Vegetable seller</button></a>
        </div>
        <div style="float: right;width:30%;text-align:right;margin:0px">
            @auth
            <div class="profileselect">
                {{ auth()->user()->name }}
                <div class="profile">
                    <a class="a" href="{{ route('userdata') }}"><button>Profile</button></a><br>
                    <a class="a" href="{{ route('cart') }}"><button>Cart</button></a><br>
                    <a class="a" href="{{ route('delivery') }}"><button>Delivery</button></a><br>
                    <a class="a" href="{{ route('logout') }}"><button>Logout</button></a><br>
                </div>
            </div>
                
            @else
                <a href="{{ route('login') }}"><button>Login</button></a>
            @endauth
        </div>   
</header>
<div id="content">
    @yield('content')
</div>

<footer>
    <p><b>Footer</b></p>
    <P>Contect number: 012-3456789</P>
    <p>Location : </p>
</footer>
<style>
    .a>button{
        width:95%;
        border-radius: 25px;
    }
    .profileselect{
        overflow-y:unset;
        position: relative;
        background: gray;
        border: 2px solid black;
        z-index: 2;
        height: 40%;
        text-align: center;
        border-radius: 25px;
    }
    .profileselect:hover .profile{
        display: block;
    }
    .profile{
        padding: 5px;
        overflow-y:unset;
        position:absolute;
        color: black;
        display: none;
        background-color: white;
        border: 2px solid black;
        width: 97%;
        z-index: 100;
        border-radius: 25px;
    }
    .profile:hover{
        display: block;
    }

    header,footer{
        border: 2px solid black;
        margin: 0px;
        background-color: white;    
    }
    header{
        height: 7% ;
        z-index:1;
        position: relative;

    }
    body{
        margin: 0px;
        background-color: aquamarine;
    }
    #content{
        margin-left: 25px;
        margin-right: 25px;
        border: 1px solid black ;
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        overflow: auto;
    }
</style>