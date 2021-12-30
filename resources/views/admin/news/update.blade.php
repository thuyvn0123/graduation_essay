@extends('layouts.admin')

@section('content')
@section('title','News')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update News</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">News</li>
                <li class="breadcrumb-item ">Create</li>
            </ol>
        </div>

        <div class="form-container p-3 rounded ">
            @foreach ( $n as $n)

            <form class="image-upload" method="post" action="{{ URL::to('/dashboard/news/post_update/'.$n->n_id) }}" enctype="multipart/form-data">

                @csrf
                <div class="form-row">
                    <div class="form-group mb-4 col-md-8">
                        <label class="form-label" for="title"><b>Title</b></label>
                        <input type="text" id="title" name="title" class="form-control" required value="{{$n->n_title}}"/>
                    </div>
                    <div class="form-group mb-4 col-md-4">
                        <label class="form-label" for="author"><b>Author</b></label>
                        <input type="text" id="author" name="author" class="form-control" required value="{{$n->n_author}}"/>
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
                        <img src="/uploads/news/{{ $n->n_thumbnail }}" alt="" style="width:10rem">

                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="desc"><b>Desciption</b></label>
                        <input type="text" id="desc" name="desc" class="form-control" required value="{{$n->n_desc}}"/>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group mb-4 col-md-12">
                        <label class="form-label" for="content"><b>Content</b></label>
                        <textarea name="content" rows="5" cols="40" class="form-control tinymce-editor" >
                            {!!$n->n_content!!}
                        </textarea>
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

        <script src="https://cdn.tiny.cloud/1/0yydpb4fa90wdj8d2gtiq3gw71wy15nrggednilnq6wltf4j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script type="text/javascript">

            tinymce.init({

                selector: 'textarea.tinymce-editor',

                height: 600,

                menubar: false,

                plugins: [

                    'advlist autolink lists link image charmap print preview anchor',

                    'searchreplace visualblocks code fullscreen',

                    'insertdatetime media table paste code help wordcount',
                    'image imagetools'

                ],

                toolbar: 'undo redo | formatselect | ' +

                    'bold italic backcolor | alignleft aligncenter ' +

                    'alignright alignjustify | bullist numlist outdent indent | ' +

                    'removeformat | help | image',

                content_css: '//www.tiny.cloud/css/codepen.min.css',
                file_picker_callback: function (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    let type = 'image' === meta.filetype ? 'Images' : 'Files',
                        url  = '/laravel-filemanager?editor=tinymce5&type=' + type;

                    tinymce.activeEditor.windowManager.openUrl({
                        url : url,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }

            });

        </script>




</div>
@endsection
