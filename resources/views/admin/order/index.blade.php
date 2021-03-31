@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Order</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Order</a></li>
                        <li class="active">List Order Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Orders -->
    <div class="orders">
        <!-- Animated -->
        <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1" >
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content" >
                                        <div class="text-left dib">
                                            @if(auth()->user()->hasRole('sales'))
                                            <div class="stat-text" style="font-size:15px">@currency($revenue)</div>
                                            @endif
                                            @if(auth()->user()->hasRole('admin'))
                                            <div class="stat-text" style="font-size:15px">@currency($revenue1)</div>
                                            @endif
                                            <div class="stat-heading">Pendapatan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            @if(auth()->user()->hasRole('sales'))
                                            <div class="stat-text"><span class="count">{{$terjual ?? '0'}}</span></div>
                                            @endif
                                            @if(auth()->user()->hasRole('admin'))
                                            <div class="stat-text"><span class="count">{{$terjual1 ?? '0'}}</span></div>
                                            @endif
                                            <div class="stat-heading">Terjual</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            @if(auth()->user()->hasRole('sales'))
                                            <div class="stat-text"><span class="count">{{$customer}}</span></div>
                                            @endif
                                            @if(auth()->user()->hasRole('admin'))
                                            <div class="stat-text"><span class="count">{{$customer1}}</span></div>
                                            @endif
                                            <div class="stat-heading">Customer</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Yearly Sales {{ now()->year }}</h4>
                                @if(auth()->user()->hasRole('sales'))
                                <canvas id="sales-chart"></canvas>
                                @endif
                                @if(auth()->user()->hasRole('admin'))
                                <canvas id="sales-chart1"></canvas>
                                @endif            
                            </div>
                        </div>
                    </div><!-- /# column -->

                </div>

            </div><!-- .animated -->
        </div>
        <!-- /.content -->
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <a href="{{route('order.search')}}" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Create</a>
                <div class="card" style="margin-top:10px;">
                    <div class="card-body">
                        <h4 class="box-title">List Order Customer</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-responsive table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Customer</th>
                                        <th>Tipe</th>
                                        <th>Nomor</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $no=0 ?>
                                        @foreach($list_order as $list)
                                        <?php $no++ ?>
                                        @if($list->order_data->id_sales == Auth::id())
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                {{$nama_customer[$list->id]}}
                                            </td>
                                            <td>{{$list->order_data->tipe}}</td>
                                            <td>{{$list->order_data->nomor}}</td>
                                            <td>
                                                {{$nama_user[$list->order_data->id]}}
                                            </td>
                                            <td>
                                                <a href="/Admin/order/edit/{{$list->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="/Admin/order/show/BAKBB/{{$list->id}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Show</a>
                                                @if($list->order_data->status_publish == 'ya')
                                                <a href="/Admin/order/download/BAKBB/{{$list->id}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-download"></i> Download</a>
                                                @endif
                                                <a href="/Admin/order/delete/{{$list->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
            <div class="text-center">
                {{ $list_order->links() }}
                <a href="{{route('order.all')}}" class="btn btn-outline-primary">View All</a>
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection
@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
@if(auth()->user()->hasRole('sales'))
<script>

    //Sales chart
    var ctx = document.getElementById( "sales-chart" );
    ctx.height = 150;
    var lc_revenue= @json($lc_revenue);//array from controller
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                label: "Pendapatan (Rp.)",
                data: lc_revenue,
                borderColor: "rgba(255, 51, 51, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(255, 0, 0, 0.5)"
                    } ]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                        } ]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    } );

</script>
@endif
@if(auth()->user()->hasRole('admin'))
<script>
    //Sales chart
    var dtx = document.getElementById( "sales-chart1" );
    dtx.height = 150;
    var lc_revenue1= @json($lc_revenue1);//array from controller
    var myChart = new Chart( dtx, {
        type: 'line',
        data: {
            labels: [ "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                label: "Pendapatan (Rp.)",
                data: lc_revenue1,
                borderColor: "rgba(255, 51, 51, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(255, 0, 0, 0.5)"
                    } ]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                        } ]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    } );
</script>
@endif
@endpush
