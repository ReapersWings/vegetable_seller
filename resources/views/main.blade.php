@extends('header')
@section('content')
    <h1>Vegetables or fruits seller</h1>
    @foreach ($data as $row)
        <button>
            <div>
                <img src="{{ $row->image  }}" alt="">
                <h5>{{ $row->p_name }}</h5>
                <p><b>{{ $row->p_price }}</b></p>
                <p><b>{{ $row->p_quantity }}</b></p>
            </div> 
        </button>
    @endforeach
    {{ $data->links() }}
@endsection