@extends('layouts.admin')

@section('content')
@section('title','Type Product')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create Type Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Type Product</li>
                <li class="breadcrumb-item ">Create</li>
            </ol>
        </div>

        <div class="form-container p-3 rounded ">
            <form action="/dashboard/type_product/post_create" method="post" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cat"><b>RoomSpace</b></label>
                        <select class="form-control" id="cat" name="rp">
                            @foreach($rp as $key => $rp)
                            <option value="{{ $rp->rp_id }}">{{ $rp->rp_name }}</option>

                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="name"><b>Name</b></label>
                        <input type="text" id="name" name="name" class="form-control" required/>
                    </div>
                </div>



                <div class="d-flex">

                    <button class="btn btn-primary w-50 mx-auto">Create</button>
                </div>


            </form>
        </div>
    </main>




</div>
@endsection
