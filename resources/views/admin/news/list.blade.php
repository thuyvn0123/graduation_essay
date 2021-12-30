@extends('layouts.admin')

@section('content')
@section('title','News')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">News List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">News</li>
                <li class="breadcrumb-item ">List</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table mr-1"></i>
                        News List</div>
                    <a class="btn btn-primary px-2 py-1 m-0"  href="/dashboard/news/create">Create</a>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($n as $key => $n)
                                <tr>
                                    <td>{{ $n->n_id }}</td>
                                    <td>{{ $n->n_title }}</td>
                                    <td><img src="/storage/news/{{ $n->n_thumbnail }}" alt="" style="width:3rem"></td>

                                    <td>{{ $n->n_desc }}</td>
                                    <td>{{ $n->n_author }}</td>


                                    <td>
                                        <a href="{{URL::to('dashboard/news_update/'.$n->n_id) }}"><i
                                                class="fas fa-wrench" style="font-size:1.5rem; color:blue;"></i></a>
                                    </td>
                                    <td class="control-items">


                                        <form method="POST" action="{{URL::to('dashboard/news/delete/'.$n->n_id) }}">

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
