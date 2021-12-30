@extends('layouts.admin')

@section('content')
@section('title','Product')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item ">Update</li>
            </ol>
        </div>

        <div class="form-container p-3 rounded ">
            <form action="{{ URL::to('/dashboard/product/post_update/'.$p_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($p as $p )

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="rp"><b>Room Space</b></label>
                        <select class="form-control rp choose " id="rp" name="rp">
                            <option>--Room Space--</option>

                            @foreach($rp as $key => $rp)
                            <option value="{{ $rp->rp_id }}">{{ $rp->rp_name }}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="tp"><b>Type Product</b></label>
                        <select class="form-control tp " id="tp" name="tp">

                        </select>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="collection" class="form-label"><b>Collection</b></label>
                        <input type="text" id="collection" class="form-control" name="collection" value="{{$p->p_collection}}">

                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 mb-4">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="text" id="name" class="form-control" name="name" required value="{{$p->p_name}}">
                    </div>
                    <div class="form-group col-md-3 mb-4">
                        <label for="quantity" class="form-label"><b>Quantity</b></label>
                        <input type="text" id="quantity" class="form-control" name="quantity" required value="{{$p->p_quantity}}">
                    </div>
                    <div class="form-group col-md-3 mb-4">
                        <label for="price" class="form-label"><b>Price</b></label>
                        <input type="text" id="price" class="form-control" name="price" required value="{{$p->p_price}}">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mb-4">
                        <label for="desc" class="form-label"><b>Description</b></label>
                        <input type="text" id="desc" class="form-control" name="desc" required value="{{$p->p_desc}}">
                    </div>
                    <div class="form-group col-md-3 mb-4">
                        <label for="size" class="form-label"><b>Size</b></label>
                        <input type="text" id="size" class="form-control" name="size" required value="{{$p->p_size}}">
                    </div>
                    <div class="form-group col-md-3 mb-4">
                        <label for="box" class="form-label"><b>Image</b></label>
                        <div id="box">
                            <input type="file" name="file" id="file" class="inputfile inputfile-2"
                                data-multiple-caption="{count} files selected"  />
                            <label for="file" class="d-flex align-items-center rounded">
                                <ion-icon name="cloud-upload-outline" class="ml-3 mr-3"></ion-icon>
                                <span>Choose a file&hellip;</span>
                            </label>
                        </div>
                        <img src="/storage/product/{{ $p->p_img }}" alt="" style="width:10rem">
                    </div>




                </div>
                <div class="d-flex">

                    <button class="btn btn-primary w-50 mx-auto">Update</button>
                </div>

                @endforeach

            </form>
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
    <script>
        $(document).ready(function(){
          $(".choose").on('change',function(){
            var action=$(this).attr('id');
            var id=$(this).val();
            var _token=$('input[name="_token"]').val();
            var result='';


            if(action=='rp'){
              result='tp';
            }
            $.ajax({
              url: '{{ url('/dashboard/product/get_type') }}',
              type:'post',
              data:{action:action,id:id,_token:_token},
              success:function(data){
                $('#'+result).html(data);
              }
            });
          });

        })
      </script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</div>
@endsection
