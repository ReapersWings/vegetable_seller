@extends('header')

@section('content')
    <h1>Vegetables or Fruits Seller</h1>
    
    <div class="product-list">
        @foreach ($data as $row)
            <a href="{{ route('product_data', ['data' => $row->id]) }}" class="product-link">
                <button class="product">
                    <div class="product-border">
                        <img src="{{ asset('storage/'.$row->image) }}" alt="{{ $row->p_name }}" class="product-image">
                        <h5>{{ $row->p_name }}</h5>
                        <p><b>RM{{ $row->p_price }}</b></p>
                        <p><b>{{ $row->p_total_quantity }}G</b></p>
                    </div> 
                </button>
            </a>
        @endforeach
    </div>

    <div class="pagination">
        {{ $data->links() }}
    </div>

    <style>
        .product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 20px;
    gap: 20px; /* Ensure consistent gap between products */
}

.product-link {
    text-decoration: none;
    flex: 1 1 calc(25% - 20px); /* Four products per row with a 20px gap */
    margin-bottom: 20px;
    box-sizing: border-box; /* Ensure padding and borders are included in the element's total width and height */
}

.product {
    width: 100%;
    height: 300px;
    background-color: white;
    border: none;
    cursor: pointer;
    transition: transform 0.2s;
}

.product:hover {
    transform: scale(1.05);
}

.product-border {
    border: 2px solid black;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
}

.product-image {
    max-width: 100%;
    height: 60%;
    object-fit: cover;
}

h5, p {
    margin: 5px 0;
    font-size: 14px;
}
svg{
    width: 5%;
    height: 5%;
}
path{
    width: 200%;
    height: 200%;   
}
/* Mobile Responsive Layout */
@media (max-width: 768px) {
    .product-link {
        flex: 1 1 calc(50% - 20px); /* Two products per row on tablets */
    }
}

@media (max-width: 480px) {
    .product-link {
        flex: 1 1 calc(100% - 20px); /* One product per row on small screens */
    }
}

    </style>
@endsection
