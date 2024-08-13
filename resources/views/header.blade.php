<header>
    <img src="{{ asset('storage/img_example/') }}" alt="">
    @auth
        <P>Name:{{ auth()->user()->name }}</P>
        <a href="{{ route('logout') }}"><button>Logout</button></a>
    @else
        <a href="{{ route('login') }}"><button>Login</button></a>
    @endauth
</header>
@yield('content')
<footer>
    <p><b>Footer</b></p>
    <P>Contect number: 012-3456789</P>
    <p></p>
</footer>
<style>
    header,footer{
        border: 2px solid black;
        margin: 0px;
    }
    body{
        margin: 0px;
    }
</style>