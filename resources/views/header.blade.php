<header>
    <div>
        <img src="{{ asset('storage/img_example/') }}" alt="">
        <a href="{{ route('main') }}"><button>Vegetable seller</button></a>
        @auth
            <P><a href="{{ route('userdata') }}">{{ auth()->user()->name }}</a></P>
            <a href="{{ route('logout') }}"><button>Logout</button></a>
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
    <p></p>
</footer>
<style>
    header,footer{
        border: 2px solid black;
        margin: 0px;
        background-color: white
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
    }
</style>