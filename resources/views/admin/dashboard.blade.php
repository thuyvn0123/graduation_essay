@extends('layouts.admin')

@section('title','Home')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Home</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Home/</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body d-flex justify-content-between">
                            <div>Bills</div>
                            <div></div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/bill/list">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body d-flex justify-content-between">
                            <div>Products</div>
                            <div></div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/product/list">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body d-flex justify-content-between">
                            <div>Users</div>
                            <div></div>
                        </div>                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/users/list">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body d-flex justify-content-between">
                            <div>Sold Products</div>
                            <div></div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/admin/bill/list">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                             Chart
                        </div>
                        <div id="chart"></div>

                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script type="text/javascript">
                            var data = <?php echo json_encode($data)?>;

                            Highcharts.chart('chart', {
                                title: {
                                    text: 'Invoice Statistics, 2021'
                                },
                                subtitle: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                        'October', 'November', 'December'
                                    ]
                                },
                                yAxis: {
                                    title: {
                                        text: 'Number of Bill'
                                    }
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                plotOptions: {
                                    series: {
                                        allowPointSelect: true
                                    }
                                },
                                series: [{
                                    name: 'Bill',
                                    data: data
                                }],
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });

                        </script>
                    </div>

                </div>

            </div>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Consultation
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Phone</th>
                                    <th>Time</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Phone</th>
                                    <th>Time</th>
                                    <th>Status</th>

                                </tr>
                            </tfoot>

                            <tbody>
                            @php
                                $consultation = App\Models\Botchat::all();

                            @endphp
                                @foreach ( $consultation as $key=> $c )
                                <tr>
                                    <td>{{$c->bot_name}}</td>
                                    <td>{{$c->bot_room}}</td>
                                    <td>{{$c->bot_phone}}</td>
                                    <td>{{$c->created_at}}</td>
                                    <td> <form action="{{ URL::to('/dashboard/bot/change_status/'.$c->bot_id) }}" method="POST">
                                            @csrf
                                            <div class="data_select">
                                                <select id="selectbox{{$c->bot_id}}" name="status" data-selected="" >

                                                    <option value="{{$c->status}}" selected disabled>{{$c->status}}</option>
                                                    <option>done</option>


                                                </select>

                                            </div>

                                        </form></td>




                                </tr>
                                <script>
                                    $("#selectbox{{$c->bot_id}}").change(function() {
                                         this.form.submit();
                                    });
                                </script>
                                @endforeach


                            </tbody>

                        </table>

                    </div>



                    <script>

                        function archiveFunction(e) {
                            e.preventDefault(); //block submit form
                            var form = document.forms["form"];
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            })
                        }


                        </script>


                </div>

            </div>

        </div>
    </main>
</div>
@endsection
