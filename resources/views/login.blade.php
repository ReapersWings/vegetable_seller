@if (session()->has('message'))
    <script>window.alert({{ session('message') }})</script>
@endif
<form action="{{ route('f_login') }}" method="POST">
    @csrf
    <label for="">Username:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Password:</label>
    <input type="password" name="password">
    @error('password')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit">
</form> 
<a href="{{ route('register') }}"><button>Register</button></a>