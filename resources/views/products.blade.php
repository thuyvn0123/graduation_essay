@extends('layouts.user')

@section('title','Products')

@section('content')
<div class="banner" style="padding:3rem;height:10rem">
    <h3>Sản Phẩm</h3>
    <div class="products-control">
        <div class="row">

            <a href="{{URL::to('products')}}" class="col-lg-3 col-6 products-bar {{ Request::is('products') ? 'products-active' : '' }} ">
                <div >
                    <p>All</p>
                </div>
            </a>
            @foreach ($rp as $rp )

            <a href="{{URL::to('products/'.$rp->rp_id) }}" class="col-lg-3 col-6 products-bar {{ Request::is('products/'.$rp->rp_id.'*') ? 'products-active' : '' }} ">
                <div >
                    <p>{{$rp->rp_name}}</p>
                </div>
            </a>
            @endforeach

        </div>


    </div>
</div>


<div class="products-content">

    <div id="projects" >
        @if (!Request::is('products'))

        <div class="data_select">
            <select id="selectbox" data-selected="" >

                <option value="-1" selected disabled>--filter--</option>
                @foreach ($tp as $tp)

                <option value="{{$tp->tp_id}}" @if (Request::is('products/'.$rp->rp_id.'/'.$tp->tp_id))
                    echo selected
                @endif>{{$tp->tp_name}}</option>

                @endforeach

            </select>

        </div>
        @endif
        <div id="echo" class="row">

        </div>
        <div id="all" class="row">
            @foreach ($p as $p )

            <a href="{{URL::to('products/detail/'.$p->p_id) }}">
                <div  class="flipper col-md-4">
                    <img src="/storage/product/{{ $p->p_img }}" alt="" class="thumbnail" >
                    <div class="featured-products-title">
                        <p>{{$p->p_name}}</p>
                    </div>
                    <div class="featured-products-title">
                        <b><p>{{ number_format($p->p_price,0,',','.') }}<span>đ</span></p></b>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="/buy-now/{{$p->p_id}}"><button class="btn btn-primary mx-2" style="width:7rem;margin-top:0rem;">Mua Ngay</button></a>
                        <a href="/add-to-cart/{{$p->p_id}}"><button class="btn btn-foreign mx-2" style="width:10rem;margin-top:0rem;">Thêm Giỏ Hàng</button></a>
                    </div>
                </div>
            </a>
            @endforeach
        </div>


    </div>
</div>

<script>
    $(document).ready(function(){
        $("#selectbox").on('change',function(){
            var id=$(this).val();
            var _token=$('input[name="_token"]').val();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ url('/products/get_product/'.$rp->rp_id) }}',
                type: 'POST',
                data: {id:id,_token: '{{csrf_token()}}'},
                success:function(data) {
                    $('#echo').html(data);
                    $('#all').hide();
                }
            });
        });

    })
</script>
<script>
    $('.flipper').hover(function(){
        $(this).siblings().addClass('blur');
        }, function(){
        $(this).removeClass('clicked').siblings().removeClass('blur');
    });

    $('.flipper').click(function(e){
        $(this).addClass('clicked');
    });

</script>

@endsection
