@extends('layouts.default')

<?php
    function rupiah($angka){
        $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
        return $hasil_rupiah;                                                                                   
    }
?>

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
                        <li><a href="/Admin/order">List Order Customer</a></li>
                        <li><a href="/Admin/order/search">Search Customer</a></li>
                        <li class="active">Create BAKBB</li>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
						<h1 class="text-center">Order Data <br> {{$fb->nama_customer}} </h1>
					</div>
                    <div class="card-body">
                        <!-- Button to Open the Modal -->
						@if($cek_order_data == 0)
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                            <i class="fa fa-plus"></i> Create Data
                        </button>
						@endif
                        <!-- The Modal -->
                        <div class="modal" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$fb->nama_customer}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="/Admin/order/store/{{$fb->id}}/data/new" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">

                                            <div class="form-group row justify-content-center">
												<div class="col-md">
													<label>Tipe</label>
												</div>
                                                <div class="col-md">
                                                    <select name="tipe" id="tipe" class="form-control">
                                                        <option value="Layanan Baru">Layanan Baru</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
											    <div class="col-md">
													<label>Nomor</label>
												</div>
                                                <div class="col-md">
                                                    <input type="text" class="form-control" id="nomor" name="nomor">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
											    <div class="col-md">
													<label>Nama Penanggung Jawab</label>
												</div>
                                                <div class="col-md">
                                                    <input type="text" value ="{{$fb->penanggung_jawab}}" class="form-control" id="nama_pj" name="nama_pj">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
											    <div class="col-md">
													<label>Jabatan Penanggung Jawab</label>
												</div>
                                                <div class="col-md">
                                                    <input type="text" value ="{{$fb->jabatan_pj}}" class="form-control" id="jabatan_pj" name="jabatan_pj">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-md">
													<label>Tanggal Kesepakatan</label>
												</div>
                                                <div class="col-md">
                                                    <input type="date" class="form-control" id="tanggal_kesepakatan" name="tanggal_kesepakatan">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
												<div class="col-md">
													<label>No. Pihak Pertama</label>
												</div>
                                                <div class="col-md">
                                                    <input type="text" class="form-control" id="no_pihak_pertama"
                                                        name="no_pihak_pertama">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
												<div class="col-md">
													<label>No. Pihak Kedua</label>
												</div>
                                                <div class="col-md">
                                                    <input type="text" class="form-control" id="no_pihak_kedua"
                                                        name="no_pihak_kedua">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-center">
												<div class="text-center col-md-12">
                                            		<label >Jangka Waktu Berlangganan</label>
												</div>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" id="" name="jangka_berlangganan"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" name="" value="Bulan"
                                                        disabled>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
												<div class="col-md">
													<label>Status Biaya</label>
												</div>
                                                <div class="col-md">
                                                    <select name="status_biaya" id="status_biaya" class="form-control">
                                                        <option value="belum">Belum Termasuk PPN</option>
                                                        <option value="sudah">Sudah Termasuk PPN</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
												<div class="col-md">
													<label>Status Penagihan</label>
												</div>
                                                <div class="col-md">
                                                    <select name="status_tagihan" id="status_tagihan" class="form-control">
                                                        <option value="awal">Awal Pemakaian Layanan</option>
                                                        <option value="akhir">Akhir Pemakaian Layanan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
												<div class="text-center col-md-12">
                                                	<label>Tanggal Mulai Penagihan</label>
												</div>
                                                <div class="col-md">
                                                    <input type="date" class="form-control" id="tanggal_penagihan"
                                                        name="tanggal_penagihan">
                                                    <br>
                                                </div>

                                                <div class="col-md">
                                                    <input placeholder="tambahkan catatan" type="text"
                                                        name="catatan_penagihan" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
												<div class="col-md">
													<label>Status Publish</label>
												</div>
                                                <div class="col-md">
                                                    <select name="status_publish" id="status_publish" class="form-control">
                                                        <option value="ya">Ya</option>
                                                        <option value="tidak">Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end of tgl mulai penagihan -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" style="width:95%">
                                <thead>
                                    <tr>
                                        <th>Nama Sales</th>
                                        <th>Tanggal Kesepakatan</th>
                                        <th>Tipe</th>
                                        <th>Nomor Perjanjian</th>
                                        <th>Nama Penanggung Jawab</th>
                                        <th>Jabatan Penanggung Jawab</th>
                                        <th>No. Pihak pertama</th>
                                        <th>No. Pihak kedua</th>
                                        <th>Jangka Waktu Berlangganan</th>
                                        <th>Status Biaya</th>
                                        <th>Status Penagihan</th>
                                        <th>Catatan Penagihan</th>
                                        <th>Tanggal Mulai Penagihan</th>
                                        <th>Status Publish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_data as $data)
                                    <tr>
                                        <td>{{ $nama_sales ?? 'Sales Belum Disesuaikan Mohon Sesuaikan Sales dengan melakukan edit Data FB'}}</td>
                                        <td>{{ $data->tanggal_kesepakatan}}</td>
                                        <td>{{ $data->tipe}}</td>
                                        <td>{{ $data->nomor }}</td>
                                        <td>{{ $data->nama_pj }}</td>
                                        <td>{{ $data->jabatan_pj }}</td>
                                        <td>{{ $data->no_pihak_pertama }}</td>
                                        <td>{{ $data->no_pihak_kedua }}</td>
                                        <td>{{ $data->jangka_berlangganan }} Bulan</td>
                                        <td>{{ $data->status_biaya }}</td>
                                        <td>{{ $data->status_tagihan }} </td>
                                        <td>{{ $data->catatan_penagihan }}</td>
                                        <td>{{ $data->tanggal_penagihan }}</td>
                                        <td>{{ $data->status_publish }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($cek_order_data == 1)
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Order Layanan </h1>
                    </div>
                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah Order
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$fb->nama_customer}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="/Admin/order/store/{{$fb->id}}/BAKBB/new" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Originating</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="originating" name="originating" required><small
                                                        class="form-text text-muted">*jika
                                                        kosong isi (-)</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Terminating</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="terminating" name="terminating" required>
                                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Jenis Layanan</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="nama_product"
                                                        name="nama_product" required>
                                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Kapasitas</label>
                                                <div class="col-md-3 ">
                                                    <input type="number" class="form-control" placeholder=""
                                                        id="kapasitas" name="kapasitas" required>
                                                    <small class="form-text text-muted">Ex. 1 Gbps/ 2 Unit</small>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="satuan_kapasitas" class="form-control">
                                                        <option value="Kbps">Kbps</option>
                                                        <option value="Mbps">Mbps</option>
                                                        <option value="Gbps">Gbps</option>
                                                        <option value="Unit">Unit</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Biaya
                                                    Berlangganan</label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" id="biaya_langganan"
                                                        name="biaya_langganan" required>
                                                    <small class="form-text text-muted">Ex. 1000000 (Hanya Diisi
                                                        Angka)</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Biaya
                                                    Instalasi</label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" id="biaya_instalasi"
                                                        name="biaya_instalasi" required>
                                                    <small class="form-text text-muted">Ex. 1000000 (Hanya Diisi
                                                        Angka)</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- tampilan data -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>originating</th>
                                        <th>terminating</th>
                                        <th>nama layanan</th>
                                        <th>kapasitas</th>
                                        <th>biaya langganan</th>
                                        <th>biaya instalasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0 ?>
                                    @foreach($layanan as $data)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no  }}</td>
                                        <td>{{ $data->originating }}</td>
                                        <td>{{ $data->terminating }}</td>
                                        <td>{{ $data->nama_layanan }}</td>
                                        <td>{{ $data->kapasitas }}</td>
                                        <td>
    
                                            <?php
                                                
                                                if($data->biaya_langganan == "0" ){
                                                    echo'-';
                                                }
                                                else
                                                    echo rupiah($data->biaya_langganan);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                
                                                if($data->biaya_instalasi == "0" ){
                                                    echo'-';
                                                }
                                                else
                                                    echo rupiah($data->biaya_instalasi);
                                            ?>
                                        </td>
                                        <td>
                                            <a href="/Admin/order/delete/{{$data->id}}/BAKBB/new" type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end of tampilan -->
                    </div>
                </div>
				@endif
            </div>
            <div class="col-sm-12">
                <div class="">
                    <div class="" style="float: right;">
                        <a class="btn btn-success" id="button_next" onclick="konfirmasi()">Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection

@push('before-script')
<script>
    function konfirmasi() {

        Swal.fire({
            title: 'Simpan Data?',
            text: "pastikan data terisi dengan benar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Data anda berhasil tersimpan",
                    icon: "success"
                    //timer: 3000
                }).then(function () {
                    window.location = "{{route('order.all')}}";
                })
            }
        })
    }

</script>
@endpush
