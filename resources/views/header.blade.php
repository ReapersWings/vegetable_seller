@session('message')
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endsession 
<header class="header-container">
    <div class="left-section">
        <img src="{{ asset('storage/images/') }}" alt="">
        <a href="{{ route('main') }}"><button class="header-button">Vegetable seller</button></a>
    </div>
    <div class="right-section">
        @auth
        <div class="profileselect">
            {{ auth()->user()->name }}
            <div class="profile-dropdown">
                <a class="header-button" href="{{ route('userdata') }}"><button>Profile</button></a><br>
                <a class="header-button" href="{{ route('cart') }}"><button>Cart</button></a><br>
                <a class="header-button" href="{{ route('delivery') }}"><button>Delivery</button></a><br>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="header-button" type="submit">Logout</button>
                </form>
            </div>
        </div>
        @else
            <a href="{{ route('login') }}"><button class="header-button">Login</button></a>
        @endauth
    </div>
</header>

<div id="content-container">
    @yield('content')
</div>

<footer class="footer-container">
    <div class="footer-content">
        <div class="footer-section">
            <h4>About Us</h4>
            <p>We are a leading vegetable seller providing fresh produce to your doorstep.</p>
        </div>
        <div class="footer-section">
            <h4>Contact Us</h4>
            <p>Phone: 012-3456789</p>
            <p>Email: support@vegetableseller.com</p>
        </div>
        <div class="footer-section">
            <h4>Location</h4>
            <p>123 Market Street, Fresh Town</p>
        </div>
        <div class="footer-section">
            <h4>Follow Us</h4>
            <a href="#">Facebook</a> | 
            <a href="#">Instagram</a> | 
            <a href="#">Twitter</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Vegetable Seller. All rights reserved.</p>
    </div>
</footer>

<style>
body {
    margin: 0px;
    background-color: aquamarine;
}

.header-container {
    border: 2px solid black;
    margin: 0px;
    background-color: white;    
    height: 7%;
    z-index: 1;
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

.left-section {
    width: 30%;
    float: left;
}

.right-section {
    width: 30%;
    text-align: right;
    float: right;
    margin: 0;
}

.header-button, .header-button>button {
    width: 95%;
    border-radius: 25px;
    margin-top: 2px; 
}

.profileselect {
    position: relative;
    background: gray;
    border: 2px solid black;
    z-index: 2;
    height: 40%;
    text-align: center;
    border-radius: 25px;
}

.profileselect:hover .profile-dropdown {
    display: block;
}

.profile-dropdown {
    padding: 5px;
    position: absolute;
    color: black;
    display: none;
    background-color: white;
    border: 2px solid black;
    width: 97%;
    z-index: 100;
    border-radius: 25px;
}

.profile-dropdown:hover {
    display: block;
}

#content-container {
    margin-left: 25px;
    margin-right: 25px;
    border: 1px solid black;
    background-color: white;
    border-radius: 15px;
    padding: 20px;
    overflow: auto; 
    margin-top: 10px;
    margin-bottom: 10px;
}

.footer-container {
    border: 2px solid black;
    margin: 0px;
    background-color: white;
    text-align: center;
    padding: 10px;
}

.footer-container {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    border-top: 2px solid #000;
    text-align: center;
    font-family: Arial, sans-serif;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.footer-section {
    max-width: 200px;
    margin: 10px;
    text-align: left;
}

.footer-section h4 {
    margin-bottom: 10px;
    font-size: 18px;
    text-transform: uppercase;
    color: #f0f0f0;
}

.footer-section p, .footer-section a {
    font-size: 14px;
    line-height: 1.6;
    color: #ddd;
}

.footer-section a {
    text-decoration: none;
    color: #ddd;
}

.footer-section a:hover {
    color: #fff;
}

.footer-bottom {
    background-color: #222;
    padding: 10px;
}

.footer-bottom p {
    margin: 0;
    font-size: 12px;
    color: #aaa;
}

/* Responsive Design for Smaller Screens */
@media (max-width: 600px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
    }

    .footer-section {
        max-width: 100%;
    }
}

</style>