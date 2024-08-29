@session('message')
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endsession 
<header>
    <div>
        <div style="float: left;width:33.33%">
            <img src="{{ asset('storage/images/') }}" alt="">
            <a href="{{ route('main') }}"><button>Vegetable seller</button></a>
        </div>
        
        <div style="float: right;width:33.33%;text-align:right;margin:0px">
            @auth
                <a href="{{ route('cart') }}"><button>Cart</button></a>
                <a href="{{ route('userdata') }}">{{ auth()->user()->name }}</a>
                <a href="{{ route('delivery') }}"><button>Delivery</button></a>
                <a href="{{ route('logout') }}"><button>Logout</button></a>
            @else
                <a href="{{ route('login') }}"><button>Login</button></a>
            @endauth
        </div>
        
    </div>
    
</header>
<div id="content">
    @yield('content')
</div>

<footer>
    <p><b>Footer</b></p>
    <P>Contect number: 012-3456789</P>
    <p></p>
</footer>
<style>
    header,footer{
        border: 2px solid black;
        margin: 0px;
        background-color: white;
        
    }
    header{
        overflow: auto;
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