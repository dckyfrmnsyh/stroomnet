@extends('layouts.default')

@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Orders -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-tittle"><a href="{{route('pages.order1')}}">Pelanggan Baru</a></strong>
                        <span class="badge badge-success pull-right r-activity">{{$countnew}}</span>
                    </div>
                    <div class="card-body--">
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-tittle"><a href="{{route('pages.order2')}}">Pelanggan Upgrade</a></strong>
                        <span class="badge badge-primary pull-right r-activity">{{$countup}}</span>
                    </div>
                    <div class="card-body--">
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-tittle"><a href="{{route('pages.order4')}}">Pelanggan Relokasi</a></strong>
                        <span class="badge badge-warning pull-right r-activity">{{$countre}}</span>
                    </div>
                    <div class="card-body--">
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-xl-4 -->
        </div>


        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-tittle"><a href="{{route('pages.order3')}}">Pelanggan Downgrade</a></strong>
                        <span class="badge badge-danger pull-right r-activity">{{$countdown}}</span>
                    </div>
                    <div class="card-body--">
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-tittle"><a href="{{route('pages.order5')}}">Pelanggan Perpanjangan</a></strong>
                        <span class="badge badge-info pull-right r-activity">{{$countper}}</span>
                    </div>
                    <div class="card-body--">
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <strong class="card-tittle"><a href="{{route('pages.order6')}}">Pelanggan Lama layanan baru</a></strong>
                        <span class="badge badge-secondary pull-right r-activity">{{$countoldnew}}</span>
                    </div>
                    <div class="card-body--">
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-xl-4 -->
        </div>


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Pelanggan</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Customer</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tipe</th>
                                        <th>Tanggal Pemesanan</th>
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
                                        <td>{{$new->tipe}}</td>
                                        <td>{{Date::parse($new->tgl_hari_ini)->format('l, d F Y')}}
                                        </td>
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
                    <div style="margin:auto">
                        {{ $tabel->links() }}
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection
