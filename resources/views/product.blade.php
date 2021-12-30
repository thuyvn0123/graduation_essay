@extends('layouts.user')

@foreach ($p as $p)

@section('title',$p->p_name)

@section('content')
<div class="banner" style="padding:2rem;height:rem">
    <h3>{{$p->p_name}}</h3>
    <h3><b>{{ number_format($p->p_price,0,',','.') }}<span>đ</span></b></h3>

    <h5><b>Kích thước: </b>{{$p->p_size}}</h5>
    <h5><b>Mô tả: </b>{{$p->p_size}}</h5>
    <a href="/buy-now/{{$p->p_id}}"><button class="btn btn-primary mx-2" style="width:7rem;margin-top:0rem;">Mua Ngay</button></a>
    <a href="/add-to-cart/{{$p->p_id}}"><button class="btn btn-foreign mx-2" style="width:10rem;margin-top:0rem;">Thêm Giỏ Hàng</button></a>
</div>


<div class="products-content">

    <div class="products-funiture-content ">
        <div id="carouselExampleIndicators" class="carousel slide slide-product" data-ride="carousel">

            <div class="carousel-inner c-inner-product">
                <div class="carousel-item active" >
                    <img src="/storage/product/{{ $p->p_img }}" alt="" class="thumbnail w-100" >
                </div>
                @foreach ($img as $img)

                <div class="carousel-item" >
                    <img src="/storage/product/{{ $img->ip_img }}" alt="" class="thumbnail w-100" >
                </div>
                @endforeach

            </div>
            <ol class="c-product d-flex justify-content-center">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="cursor: pointer">
                    <img src="/storage/product/{{ $p->p_img }}" alt="" class="thumbnail w-100" >
                </li>
                @foreach ($i_sl as $i_sl)

                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i_sl->ip_id}}" style="cursor: pointer">
                    <img src="/storage/product/{{ $i_sl->ip_img }}" alt="" class="thumbnail w-100" >

                </li>
                @endforeach
            </ol>
        </div>


    </div>


</div>
<div class="recomment">
    <h5>SẢN PHẨM LIÊN QUAN</h5>
    <div class="row">
    @foreach ($products as $products )

    <a href="{{URL::to('products/detail/'.$products->p_id) }}">
        <div  class="flipper col-md-3" style="height: 21.5rem">
            <img src="/storage/product/{{ $products->p_img }}" alt="" class="thumbnail" >
            <div class="featured-products-title">
                <p>{{$products->p_name}}</p>
            </div>
            <div class="featured-products-title">
                <b><p>{{ number_format($products->p_price,0,',','.') }}<span>đ</span></p></b>
                <h5 class="card-title">Similarity: {{ round($products->similarity * 100, 1) }}%</h5>

            </div>
            <div class="">
                <a href=""><button class="btn btn-primary mx-2 col-md-4" >Mua Ngay</button></a>
                <a href=""><button class="btn btn-foreign mx-2 col-md-6" >Thêm Giỏ Hàng</button></a>
            </div>
        </div>
    </a>
    @endforeach

</div>

</div>
@endforeach

@endsection
