@extends('layouts.user')

@section('title',$key)

@section('content')

<div class="banner"
    style="background-image:url('./img/about.png');background-size:100%">
    <h3>Dịch Vụ</h3>
</div>

<div class="search-result">
    <h4>Kết quả tìm kiếm cho “{{$key}}”</h4>
    <p>{{$count}} kết quả được tìm thấy</p>
    <br>

    <div class="search-result-container row">
        @foreach ($p as $p )

        <div class="col-md-12 search-result-item">
            <a href="{{URL::to('products/detail/'.$p->p_id) }}">
                <div class="row">
                    <div class="col-xl-4">
                        <img src="/storage/product/{{ $p->p_img }}" alt="" class="thumbnail" >
                    </div>
                    <div class="col-xl-8">
                        <h4>Sản Phẩm</h4>
                        <h5>{{$p->p_name}}</h5>
                        <p style="font-weight:600;font-size:1rem">{{ number_format($p->p_price,0,',','.') }}<span>đ</span></p>
                        <p></p>

                    </div>
                </div>
            </a>

        </div>
        <br>

        @endforeach
        @foreach ($n as $n )

        <div class="col-md-12 search-result-item">
            <a href="{{URL::to('news/detail/'.$n->n_id) }}">
                <div class="row">
                    <div class="col-xl-4">
                        <img src="/storage/news/{{ $n->n_thumbnail }}" alt="" class="thumbnail" >
                    </div>
                    <div class="col-xl-8">
                        <h4>Tin Tức</h4>
                        <h5>{{$n->n_title}}</h5>
                        <p></p>
                        <p></p>

                    </div>
                </div>
            </a>

        </div>

        <br>

        @endforeach


        @foreach ($pr as $pr )

        <div class="col-md-12 search-result-item">
            <a href="{{URL::to('projects/detail/'.$pr->pr_id) }}">
                <div class="row">
                    <div class="col-xl-4">
                        <img src="/storage/project/{{ $pr->pr_thumbnail }}" alt="" class="thumbnail" >
                    </div>
                    <div class="col-xl-8">
                        <h4>Dự Án</h4>
                        <h5>{{$pr->pr_title}}</h5>
                        <p></p>
                        <p></p>

                    </div>
                </div>
            </a>

        </div>

        <br>

        @endforeach






    </div>


</div>


@endsection
