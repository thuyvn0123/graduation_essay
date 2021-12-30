@extends('layouts.admin')

@section('content')

@section('title','Bill Detail')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">{{$b_id}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{$b_id}}</li>
                <li class="breadcrumb-item ">List</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table mr-1"></i>
                        Bills List</div>

                    <div><b>Total: </b> {{ number_format($total,0,',','.') }}<span>đ</span> </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach ($bd as $bd)

                                <tr>
                                    <td>{{$bd->bd_id}}</td>
                                    <td>{{$bd->bd_name}}</td>
                                    <td><img src="/storage/product/{{ $bd->bd_img }}" alt="" style="width:3rem"></td>
                                    <td>{{$bd->bd_quantity}}</td>

                                    <td>{{ number_format($bd->bd_price,0,',','.') }}<span>đ</span></td>


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


@endsection
