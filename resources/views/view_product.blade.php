@extends('header')
@section('content')
<div class="product-container">
    <img src="{{ asset('storage/'.$data->image) }}" alt="" class="product-img">
    <h1 class="product-title">Vegetable: {{ $data->p_name }}</h1>
    <h4 class="product-storage">Storage: {{ $data->p_total_quantity }} G</h4>
    <p class="product-price">RM<b id="price">{{ $data->p_price }}</b>/1000G</p>
    
    <form action="{{ route('f_add_cart') }}" method="post" class="cart-form">
        @csrf
        <!-- Weight adjustment buttons -->
        <div class="weight-controls">
            <button type="button" class="adjust-button" onclick="minusgram(1000)">-1KG</button>
            <button type="button" class="adjust-button" onclick="minusgram(100)">-100G</button>
            
            <!-- Input for weight -->
            <input type="number" min="100" step="100" name="c_quantity" id="gram" value="1000" oninput="culcelate({{ $data->p_price }})" readonly class="gram-input">G
            
            <!-- Add more weight -->
            <button type="button" class="adjust-button" onclick="addgram(100)">+100G</button>
            <button type="button" class="adjust-button" onclick="addgram(1000)">+1KG</button>
        </div>

        <!-- Reset and submit buttons -->
        <div class="cart-actions">
            <button type="button" class="reset-button" onclick="resetgram()">Reset</button><br>
            @error('c_quantity')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <button type="submit" class="add-to-cart" name="product_id" value="{{ $data->id }}">Add to Cart</button>
        </div>
    </form>
</div>

<script>
    function culcelate(originalprice){
        let pricevalue = document.getElementById('price')
        let gramvalue = document.getElementById('gram').value
        pricevalue.innerHTML= (gramvalue / 1000 ) * originalprice
    }

    function resetgram(){
        document.getElementById('gram').value = 1000
        culcelate({{ $data->p_price }})
    }

    function addgram(pustgramvalue){
        let gvalue = document.getElementById('gram')
        gvalue.value = parseInt(gvalue.value) + pustgramvalue
        culcelate({{ $data->p_price }})
    }

    function minusgram(gramvalue){
        let gvalue = document.getElementById('gram')
        if (gvalue.value > gramvalue) {
            gvalue.value = parseInt(gvalue.value) - gramvalue
            culcelate({{ $data->p_price }})
        }
    }
</script>

<style>
   .product-container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    border: 2px solid #ccc;
    border-radius: 15px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center content horizontally */
}

.product-img {
    max-height: 450px;
    max-width: 100%;
    object-fit: cover;
    border: 2px solid #ddd;
    border-radius: 10px;
    margin-bottom: 20px;
}

.product-title {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
    border-bottom: 2px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
    width: 100%;
    text-align: center;
}

.product-storage, .product-price {
    font-size: 18px;
    color: #666;
    width: 100%; /* Ensure the text spans the full width */
    text-align: center; /* Center the text */
}

.cart-form {
    margin-top: 20px;
    width: 100%; /* Ensure the form spans the full width */
    text-align: center;
}

.weight-controls, .cart-actions {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap; /* Ensures that buttons wrap on smaller screens */
}

.adjust-button, .reset-button, .add-to-cart {
    padding: 10px 15px;
    margin: 5px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    flex-grow: 1; /* Ensures that buttons take up the same space */
    max-width: 120px; /* Optional: limits the button width */
}

.gram-input {
    width: 100px;
    padding: 8px;
    margin: 0 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
}

@media (max-width: 600px) {
    .product-container {
        width: 90%;
    }

    .adjust-button, .reset-button, .add-to-cart {
        width: 45%;
        margin: 5px auto;
    }

    .gram-input {
        width: 100px;
    }
}

</style>
@endsection
