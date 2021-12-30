@extends('layouts.admin')

@section('content')
@section('title','Type Product')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update Type Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Type Product</li>
                <li class="breadcrumb-item ">Update</li>
            </ol>
        </div>

        <div class="form-container p-3 rounded ">
            <form action="{{ URL::to('/dashboard/type_product/post_update/'.$tp_id) }}" method="post" >
                @csrf
                <div class="row">
                    @foreach ($tp as $tp )

                    <div class="form-group col-md-6">
                        <label for="cat"><b>RoomSpace</b></label>
                        <select class="form-control" id="cat" name="rp">
                            @foreach($rp as $key => $rp)
                            <option value="{{ $rp->rp_id }}" @if ($tp->rp_id == $rp->rp_id) echo selected @endif>
                                {{ $rp->rp_name }}
                            </option>

                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="name"><b>Name</b></label>
                        <input type="text" id="name" name="name" class="form-control" required value="{{$tp->tp_name}}"/>
                    </div>
                    @endforeach

                </div>



                <div class="d-flex">

                    <button class="btn btn-primary w-50 mx-auto">Update</button>
                </div>


            </form>
        </div>
    </main>




</div>
@endsection
