@extends('layouts.admin')

@section('content')
@section('title','Project')


<div id="layoutSidenav_content">
    <main>
        @foreach ($pr as $pr )

        <div class="container-fluid">
            <h1 class="mt-4">Images Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Project</li>
                <li class="breadcrumb-item ">{{$pr->pr_title}}</li>
            </ol>
        </div>
        @endforeach

            <div class="form-container p-3 rounded mb-4">
                <form action="{{ URL::to('/dashboard/project/post_images/'.$pr_id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mt-2 ">

                        <div class="form-group col-md-6 ">
                            <label for="box" class="form-label"><b>Image</b></label>
                            <div id="box">
                                <input type="file" name="image[]" id="file1" class="inputfile inputfile-1"
                                    data-multiple-caption="{count} files selected" multiple />
                                <label for="file1" class="d-flex align-items-center rounded">
                                    <ion-icon name="cloud-upload-outline" class="ml-3 mr-3"></ion-icon>
                                    <span>Choose a file&hellip;</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex mx-auto mb-2">
                        @foreach ($ipr as $ipr )

                        <div class="d-flex my-1  img-thumbnail ">
                            <img src="/storage/project/{{ $ipr->ipr_img }}" alt="" style="width:6rem" class="mx-auto">
                            <a href="{{ URL::to('/dashboard/project/images/delete/'.$ipr->ipr_id) }}" method="get" class="btn m-auto ">
                                <ion-icon name="trash-outline" style="font-size:1rem;"></ion-icon>
                            </a>
                        </div>
                        @endforeach

                    </div>



                    <div class="d-flex">

                        <button class="btn btn-primary w-50 mx-auto">Save</button>
                    </div>


                </form>

            </div>
        </div>
    </main>


    <script>
    var inputs = document.querySelectorAll('.inputfile-1');
    Array.prototype.forEach.call(inputs, function(input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function(e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '')
                .replace(
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
