@extends('layouts.user')

@section('title','Tin tức')

@section('content')


<div class="banner"
    style="background-image:url('./img/news.jpg');background-size:100%;padding:7rem 0;">
    <h3>Tin tức</h3>

</div>

<div class="news-container">
    <div class="row">
        @foreach ($n as $n )

        <div class="col-md-4 news-item">
            <a href="/news/detail/{{$n->n_id}}">
                <img src="/storage/news/{{ $n->n_thumbnail }}" alt="" class="thumbnail" >

                <div class="news-item-content">
                    <h5 style="font-size:1rem"><b>{{$n->n_title}}</b></h5>
                    <p>{{$n->n_desc}}</p>
                    <span>{{$n->updated_at}} by {{$n->n_author}}</span>
                </div>
            </a>
        </div>
        @endforeach


    </div>




</div>


@endsection
