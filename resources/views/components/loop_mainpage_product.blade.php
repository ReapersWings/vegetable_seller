@props(['data'])
@if (count($data) !== 0)
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
@else
    <H1><---NOt have any product !---></H1>
@endif
