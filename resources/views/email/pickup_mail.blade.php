<div>
    <h1>Token pick up:</h1>
    <h1><b>{{ $token }}</b></h1>
    @foreach ($data as $row)
            <a href="{{ route('view_product_delivery',['id'=>$row['c_id'],'type'=>'pick_up']) }}">
                <button style="width: 100%;">
                    <div>
                        <h1 style="margin: 0%;">{{ $row['p_name'] }}</h1>
                        <p>Price: <b>RM{{ $row['p_price'] }}/1000gram(G)</b></p>
                        <p>Buy: <b>RM{{ $row['c_total_price'] }}/{{ $row['c_quantity'] }}</b></p>
                        <p></p>
                    </div>
                </button>   
            </a>
    @endforeach
    <h1>Date:{{ date('Y-m-d H:i:s' , strtotime('+1 days')).'-'.$data[0]['p_expire_date'] }}</h1>
</div>