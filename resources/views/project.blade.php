@extends('layouts.user')

@foreach ($pr as $pr)

@section('title',$pr->pr_title)

@section('content')
<div class="banner" style="padding: 2rem">
    <h3>{{$pr->pr_title}}</h3>
</div>


<div class="project-content row">
    <div class="col-md-6">
        <p><b>Vị Trí: </b>{{$pr->pr_location}}</p>
        <p><b>Thương hiệu sản phẩm: </b>{{$pr->pr_brand}}</p>
        <p><b>Phong cách: </b>{{$pr->pr_style}}</p>
        <p><b>Mô tả: </b>{{$pr->pr_desc}}</p>

    </div>
    <div class="col-md-6">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/storage/project/{{ $pr->pr_thumbnail }}" alt="" class="w-100" >
                </div>
                @foreach ($ipr as $ipr)

                <div class="carousel-item">
                    <img src="/storage/project/{{ $ipr->ipr_img}}" alt="" class="w-100" >
                </div>
                @endforeach


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

@endforeach

@endsection
