@extends('layouts.admin')

@section('content')
@section('title','Project')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update Project</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Project</li>
                <li class="breadcrumb-item ">Update</li>
            </ol>
        </div>

        <div class="form-container p-3 rounded ">
            @foreach ( $pr as $pr)

            <form class="image-upload" method="post" action="{{ URL::to('/dashboard/project/post_update/'.$pr->pr_id) }}" enctype="multipart/form-data">

                @csrf
                <div class="form-row">
                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="title"><b>Title</b></label>
                        <input type="text" id="title" name="title" class="form-control" required value="{{$pr->pr_title}}"/>
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="location"><b>Location</b></label>
                        <input type="text" id="location" name="location" class="form-control" required value="{{$pr->pr_location}}"/>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="brand"><b>Brand Product</b></label>
                        <input type="text" id="brand" name="brand" class="form-control" required value="{{$pr->pr_brand}}"/>
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="style"><b>Style</b></label>
                        <input type="text" id="style" name="style" class="form-control" required value="{{$pr->pr_style}}"/>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-4">
                        <label for="box" class="form-label"><b>Thumbnail</b></label>
                        <div id="box">
                            <input type="file" name="file" id="file" class="inputfile inputfile-2"
                                data-multiple-caption="{count} files selected"  />
                            <label for="file" class="d-flex align-items-center rounded">
                                <ion-icon name="cloud-upload-outline" class="ml-3 mr-3"></ion-icon>
                                <span>Choose a file&hellip;</span>
                            </label>
                        </div>
                        <img src="/storage/project/{{ $pr->pr_thumbnail }}" alt="" style="width:10rem">

                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="desc"><b>Desciption</b></label>
                        <input type="text" id="desc" name="desc" class="form-control" required value="{{$pr->pr_desc}}"/>
                    </div>
                </div>


                <div class="d-flex">
                    <button class="btn btn-primary w-50 mx-auto">Update</button>
                </div>

                <script>
                var inputs = document.querySelectorAll('.inputfile');
                Array.prototype.forEach.call(inputs, function(input) {
                    var label = input.nextElementSibling,
                        labelVal = label.innerHTML;

                    input.addEventListener('change', function(e) {
                        var fileName = '';
                        if (this.files && this.files.length > 1)
                            fileName = (this.getAttribute('data-multiple-caption') || '').replace(
                                '{count}', this.files.length);
                        else
                            fileName = e.target.value.split('\\').pop();

                        if (fileName)
                            label.querySelector('span').innerHTML = fileName;
                        else
                            label.innerHTML = labelVal;
                    });
                });
                </script>




            </form>
            @endforeach

        </div>




</div>
@endsection
