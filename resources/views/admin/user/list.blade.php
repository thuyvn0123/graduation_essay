@extends('layouts.admin')

@section('content')
@section('title','User')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">User List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">User Lisst</li>
                <li class="breadcrumb-item ">List</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table mr-1"></i>
                        Room Space List</div>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach ($u as $u)

                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td >
                                        @if ($u->level != 'super_admin')
                                        <form action="{{URL::to('dashboard/user/grant/'.$u->id) }}" method="post" class="d-flex align-items-center justify-content-around">
                                            @csrf
                                            <div style="text-align: left;padding-left: 1rem" >
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{$u->id}}" id="admin" @if ($u->level == 'admin')
                                                        echo checked
                                                    @endif value="admin" >
                                                    <label class="form-check-label" for="admin">
                                                    Admin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="{{$u->id}}" id="user" @if ($u->level == 'user')
                                                        echo checked
                                                    @endif value="user">
                                                    <label class="form-check-label" for="user">
                                                    User
                                                    </label>
                                                </div>
                                            </div>

                                                <button class="btn btn-primary" >Grant</button>
                                        </form>
                                        @else <div class="text-eff">
                                            <p>Super Admin</p>
                                            </div>
                                        @endif


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


@endsection
