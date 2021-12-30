@extends('layouts.admin')

@section('content')
@section('title','Product')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Product List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item ">List</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table mr-1"></i>
                        Product List</div>
                    <a class="btn btn-primary px-2 py-1 m-0"  href="/dashboard/product/create">Create</a>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Desc</th>
                                    <th>Room</th>
                                    <th>Type</th>
                                    <th>Collection</th>
                                    <th>Images</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Name</th>
                                    <th>Thumbnail</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Desc</th>
                                    <th>Room</th>
                                    <th>Type</th>
                                    <th>Collection</th>
                                    <th>Images</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($p as $key => $p)
                                <tr>
                                    {{-- <td>{{ $p->p_id }}</td> --}}
                                    <td>{{ $p->p_name }}</td>
                                    <td><img src="/storage/product/{{ $p->p_img }}" alt="" style="width:3rem"></td>
                                    <td>{{ $p->p_size }}</td>
                                    <td>{{ number_format($p->p_price,0,',','.') }}<span>đ</span></td>
                                    <td>{{ $p->p_quantity }}</td>
                                    <td>{{ $p->p_desc }}</td>
                                    <td>{{ $p->rp_name }}</td>
                                    <td>{{ $p->tp_name }}</td>
                                    <td>{{ $p->p_collection }}</td>
                                    <td class="control-items">
                                        <a href="{{URL::to('dashboard/product/images/'.$p->p_id) }}"
                                            class="btn btn-delete">
                                            <ion-icon name="settings-outline" style="font-size:2rem; color:black;">
                                            </ion-icon>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{URL::to('dashboard/product/update/'.$p->p_id) }}"><i
                                                class="fas fa-wrench" style="font-size:1.5rem; color:blue;"></i></a>
                                    </td>
                                    <td class="control-items">



                                            <form method="POST" action="{{URL::to('dashboard/product/delete/'.$p->p_id) }}">

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
