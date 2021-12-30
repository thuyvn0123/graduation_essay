@extends('layouts.user')

@section('title','Projects')

@section('content')
<div class="banner"
    style="background-image:url('./img/project.jpg');background-size:100%;padding:7rem 0;">
    <h3>Dự án</h3>

</div>

<div class="signature-container">

    <div class="row">
        @foreach ($pr as $pr )

        <div class="col-md-4">
            <a href="/projects/detail/{{$pr->pr_id}}">
                <div class="box">
                    <img src="/storage/project/{{ $pr->pr_thumbnail }}" alt="" class="thumbnail" >

                    <div class="box-content">
                        <h3 class="title">{{$pr->pr_title}}</h3>
                        <span class="post">{{$pr->pr_style}}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>


</div>


@endsection
