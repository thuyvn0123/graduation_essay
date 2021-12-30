@extends('layouts.admin')

@section('content')
@section('title','RoomSpace')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create Room Space</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Room Space</li>
                <li class="breadcrumb-item ">Create</li>
            </ol>
        </div>

        <div class="form-container p-3 rounded ">
            <form action="/dashboard/room_space/post_create" method="post" >
                @csrf
                    <div class="form-group mb-4 col-md-6">
                        <label class="form-label" for="name"><b>Name</b></label>
                        <input type="text" id="name" name="name" class="form-control" required/>
                    </div>


                    <div class="d-flex">

                        <button class="btn btn-primary w-50 mx-auto">Create</button>
                    </div>



            </form>
        </div>
    </main>




</div>
@endsection
