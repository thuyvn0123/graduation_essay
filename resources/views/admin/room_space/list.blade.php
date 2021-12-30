@extends('layouts.admin')

@section('content')
@section('title','RoomSpace')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Room Space List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Room Space</li>
                <li class="breadcrumb-item ">List</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table mr-1"></i>
                        Room Space List</div>
                    <a class="btn btn-primary px-2 py-1 m-0"  href="/dashboard/room_space/create">Create</a>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($rp as $key => $rp)
                                <tr>
                                    <td>{{ $rp->rp_id }}</td>
                                    <td>{{ $rp->rp_name }}</td>
                                    <td>
                                        <a href="{{URL::to('dashboard/room_space/update/'.$rp->rp_id) }}"><i
                                                class="fas fa-wrench" style="font-size:1.5rem; color:blue;"></i></a>
                                    </td>
                                    <td class="control-items">


                                        <form method="POST" action="{{URL::to('dashboard/room_space/delete/'.$rp->rp_id) }}">

                                            @csrf

                                            <input name="_method" type="hidden" value="DELETE">

                                            <ion-icon class="show_confirm" data-toggle="tooltip" title='Delete' name="trash-outline" style="font-size:2rem;color:red;cursor: pointer;"></ion-icon>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>


                        </table>

                    </div>



                </div>

            </div>
        </div>
    </main>
</div>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {

         var form =  $(this).closest("form");

         var name = $(this).data("name");

         event.preventDefault();
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {

           if (willDelete.isConfirmed) {

             form.submit();

           }

         });

     });

</script>

@endsection
