<form action="{{ route('loop_main','Reverse') }}" method="post">
    @csrf
    <select name="select" id="select">
        <option value="data">date</option>
        <option value="name">name</option>
        <option value="quantity">quantity</option>
        <option value="price">price</option>
    </select>
    <input type="submit">
</form>