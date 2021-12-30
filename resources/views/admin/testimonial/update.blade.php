@extends('layouts.admin')

@section('content')
@section('title','Testimonial')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Testimonial</li>
                <li class="breadcrumb-item ">Update</li>
            </ol>
        </div>
        @foreach ($tt as $tt )

        <div class="form-container p-3 rounded ">
            <form action="{{ URL::to('/dashboard/testimonial/post_update/'.$tt->tt_id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-9 mb-4">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="text" id="name" class="form-control" name="name" required value="{{$tt->tt_name}}">
                    </div>
                    <div class="form-group col-md-3 mb-4">
                        <label for="box" class="form-label"><b>Avatar</b></label>
                        <div id="box">
                            <input type="file" name="file" id="file" class="inputfile inputfile-2"
                                data-multiple-caption="{count} files selected"  />
                            <label for="file" class="d-flex align-items-center rounded">
                                <ion-icon name="cloud-upload-outline" class="ml-3 mr-3"></ion-icon>
                                <span>Choose a file&hellip;</span>
                            </label>
                        </div>
                        <img src="/storage/testimonial/{{ $tt->tt_avt }}" alt="" style="width:10rem">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 mb-4">
                        <label for="comment" class="form-label"><b>Information</b></label>
                        <input type="text" id="comment" class="form-control" name="comment" required value="{{$tt->tt_comment}}">
                    </div>
                </div>

                <div class="d-flex">
                    <button class="btn btn-primary w-50 mx-auto">Update</button>
                </div>



            </form>
            @endforeach

        </div>
    </main>
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



</div>
@endsection
