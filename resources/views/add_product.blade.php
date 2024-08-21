@session('message')
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endsession 
<form action="{{ route('f_add_product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Image:</label>
    <input type="file" name="image" value="{{ old('image') }}">
    @error('image')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Vagetable</label>
    <input type="text" name="p_name" value="{{ old('p_name') }}">
    @error('p_name')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Total quantity(g):</label>
    <input type="number" name="p_total_quantity" value="{{ old('p_total_quantity') }}">
    @error('p_total_quantity')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Price:</label>
    <input type="text" name="p_price" value="{{ old('p_price') }}">/(1000g)
    @error('p_price')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit">
</form>
<script>

</script>