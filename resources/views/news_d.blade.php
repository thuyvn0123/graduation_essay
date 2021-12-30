@extends('layouts.user')

@foreach ($n as $n)

@section('title','News')

@section('content')


<div class="banner"
    style="padding:1rem 10rem">
<h3><b>{{$n->n_title}}</b></h3>
{{$n->n_desc}}
</div>

<div class="news-container">


<div class="news-detail-content">
    {!!$n->n_content!!}
</div>
<br>
<br>
<div class="d-flex justify-content-between" >
    <b>{{$n->n_author}}</b>
    <span>{{$n->updated_at}}</span>
</div>

<hr>


</div>

@endforeach

@endsection
