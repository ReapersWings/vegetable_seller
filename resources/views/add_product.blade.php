@extends('form_header')
@section('content')
    <form action="{{ route('f_add_product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="" style="width: 10%;">Image:</label>
    <input type="file" name="image" value="{{ old('image') }}" onchange="changeImage(this)" >
    @error('image')
        <p>{{ $message }}</p>
    @enderror
    <div style="max-width: 100%;margin-top:4px">
        <img src="{{ old('image') }}" alt="" id="imagedisplay">    
    </div>
    <label for="">Vagetable Name:</label>
    <input type="text" name="p_name" value="{{ old('p_name') }}">
    @error('p_name')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Total quantity<b>(KG)</b>:</label>
    <input type="number" name="p_total_quantity" value="{{ old('p_total_quantity') }}">
    @error('p_total_quantity')
        <p>{{ $message }}</p>
    @enderror
    <label for="">Price<b>(1KG)</b>:</label>
    <input type="text" name="p_price" value="{{ old('p_price') }}">
    @error('p_price')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit" id="submit">
    <a href="{{ route('admin_main') }}"><button type="button">Back</button></a>
</form>
<script>
    function changeImage(inputElement) {
        var img = inputElement.files[0]; // Get the first file selected
        if (img) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagedisplay').src = e.target.result;
            }
            reader.readAsDataURL(img); // Read the file as a data URL (base64 string)
        } else {
            console.log("No file selected");
        }
    }
</script>
@endsection
