@extends('layouts.admin')

@section('content')
@section('title','Bills')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Bill List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Bill List</li>
                <li class="breadcrumb-item ">List</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table mr-1"></i>
                        Bills List</div>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach ($b as $b)

                                <tr>
                                    <td><a href="{{ URL::to('/dashboard/bill/detail/'.$b->b_id) }}" style="color:blue">{{$b->b_id}}</a></td>
                                    <td>{{$b->b_name}}</td>
                                    <td>{{$b->b_email}}</td>
                                    <td>{{$b->b_phone}}</td>
                                    <td>{{$b->b_company}}</td>
                                    <td>{{$b->b_address}}</td>
                                    <td>{{$b->b_method}}</td>

                                    <td>
                                        <form action="{{ URL::to('/dashboard/bill/change_status/'.$b->b_id) }}" method="POST">
                                            @csrf
                                            <div class="data_select">
                                                <select id="selectbox{{$b->b_id}}" name="status" data-selected="" >

                                                    <option value="{{$b->b_status}}" selected disabled>{{$b->b_status}}</option>
                                                    <option>Xử lý</option>
                                                    <option>Giao hàng</option>
                                                    <option>Thanh toán</option>
                                                    <option>Hoàn thành</option>

                                                </select>

                                            </div>

                                        </form>
                                    </td>
                                </tr>
                                <script>
                                    $("#selectbox{{$b->b_id}}").change(function() {
                                         this.form.submit();
                                    });
                                </script>
                                @endforeach

                            </tbody>


                        </table>

                    </div>



                </div>

            </div>
        </div>
    </main>
</div>


@endsection
