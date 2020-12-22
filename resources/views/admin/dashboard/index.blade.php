@extends('layouts.default')

@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-sm-6 col-lg">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body">
                    <div class="card-left pt-1 float-left">
                        <?php $total_langganan=0 ?>
                        <?php $total_instalasi=0 ?>
                        <?php $total_langganan1=0 ?>
                        <?php $total_instalasi1=0 ?>
                        <?php $pendapatan=0 ?>
                        @foreach($allOrder as $o)
                        <?php $total_langganan += $o->biaya_langganan ?>
                        <?php $total_instalasi += $o->biaya_instalasi ?>
                        @endforeach
                        @foreach($allOldorder as $o)
                        <?php $total_langganan1 += $o->biaya_langganan ?>
                        <?php $total_instalasi1 += $o->biaya_instalasi ?>
                        @endforeach
                        <?php $pendapatan = $total_langganan + $total_langganan1 + $total_instalasi + $total_instalasi1 ?>

                        <h3 class="mb-0 fw-r">
                            <span class="" style="font-size:20px;">@currency($pendapatan)</span>
                        </h3>
                        <p class="text-light mt-1 m-0">Pendapatan</p>
                    </div><!-- /.card-left -->

                    <div class="card-right float-right text-right">
                        <i class="icon fade-5 icon-lg pe-7s-cart"></i>
                    </div><!-- /.card-right -->

                </div>

            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg">
            <div class="card text-white bg-flat-color-6">
                <div class="card-body">
                    <div class="card-left pt-1 float-left">
                        <h3 class="mb-0 fw-r">
                            <span class="count float-left">{{$total_order}}</span>
                            <br>
                        </h3>
                        <p class="text-light mt-1 m-0">Layanan Baru</p>
                    </div><!-- /.card-left -->
                    <div class="card-right float-right text-right">
                        <div id="flotBar1" class="flotBar1"></div>
                    </div><!-- /.card-right -->

                </div>

            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg">
            <div class="card text-white bg-flat-color-3">
                <div class="card-body">
                    <div class="card-left pt-1 float-left">
                        <h3 class="mb-0 fw-r">
                            <span class="count">{{$total_client}}</span>
                        </h3>
                        <p class="text-light mt-1 m-0">Total Pelanggan</p>
                    </div><!-- /.card-left -->

                    <div class="card-right float-right text-right">
                        <i class="icon fade-5 icon-lg pe-7s-users"></i>
                    </div><!-- /.card-right -->

                </div>

            </div>
        </div>
        <!--/.col-->

    </div>
    <!-- /Widgets -->

    <div class="clearfix"></div>
    <!-- Orders -->
    <div class="orders">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">10 Pelanggan Terakhir</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Customer</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Email Penanggung Jawab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0 ?>
                                    @forelse($tabel as $new)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$new->nama_customer}}</td>
                                        <td>{{$new->penanggung_jawab}}</td>
                                        <td>{{$new->email_pj}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                             Data tidak tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->

        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection

