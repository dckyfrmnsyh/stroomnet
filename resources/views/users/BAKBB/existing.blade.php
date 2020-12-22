<?php
    function rupiah($angka){
        $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
        return $hasil_rupiah;                                                                                   
    }
?>
@extends('layouts.user')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8" style="margin-bottom:20px">
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
                            <form action="{{route('users.store_data')}}" method="post">
                                {{ csrf_field() }}
                                <div class="modal-body">

                                    <div class="form-group row justify-content-center">
                                        <div class="col-md">
                                            <label>Tipe</label>
                                        </div>
                                        <div class="col-md">
                                            <select name="tipe" id="tipe" class="form-control">
                                                <option value="Layanan Upgrade">Upgrade</option>
                                                <option value="Layanan Downgrade">Downgrade</option>
                                                <option value="Layanan Relokasi">Relokasi</option>
                                                <option value="Layanan Perpanjangan">Perpanjangan</option>
                                                <option value="Change Tarif">Change Tarif</option>
                                                <option value="Upgrade On Demand">Upgrade On Demand</option>
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
                                            <label>Tanggal Kesepakatan</label>
                                        </div>
                                        <div class="col-md">
                                            <input type="date" class="form-control" id="tanggal_kesepakatan"
                                                name="tanggal_kesepakatan">
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
                                            <label>Jangka Waktu Berlangganan</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="" name="jangka_berlangganan"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="" value="Bulan" disabled>
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
                                            <input placeholder="tambahkan catatan" type="text" name="catatan_penagihan"
                                                class="form-control">
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
                                <th>Tanggal Kesepakatan</th>
                                <th>Tipe</th>
                                <th>Nomor Perjanjian</th>
                                <th>No. Pihak pertama</th>
                                <th>No. Pihak kedua</th>
                                <th>Jangka Waktu Berlangganan</th>
                                <th>Catatan Penagihan</th>
                                <th>Tanggal Mulai Penagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_data as $data)
                            <tr>
                                <td>{{ $data->tanggal_kesepakatan}}</td>
                                <td>{{ $data->tipe}}</td>
                                <td>{{ $data->nomor }}</td>
                                <td>{{ $data->no_pihak_pertama }}</td>
                                <td>{{ $data->no_pihak_kedua }}</td>
                                <td>{{ $data->jangka_berlangganan }} Bulan</td>
                                <td>{{ $data->catatan_penagihan }}</td>
                                <td>{{ $data->tanggal_penagihan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8" style="margin-bottom:20px">
        @if($cek_order_data == 1)
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Order Layanan Lama</h1>
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
                            <form action="{{route('users.store_exist')}}" method="post">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Originating</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" id="originating"
                                                name="originating" required><small class="form-text text-muted">*jika
                                                kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Terminating</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" id="terminating"
                                                name="terminating" required>
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
                                            <input type="number" class="form-control" placeholder="" id="kapasitas"
                                                name="kapasitas" required>
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
                            @foreach($layanan1 as $data)
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
                                    <a href="/users/profile/bakbb/delete/{{$data->id}}" type="button"
                                        class="btn btn-danger btn-sm">
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
    <div class="col-md-8" style="margin-bottom:20px">
        @if($cek_order_data == 1)
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Order Layanan Baru</h1>
            </div>
            <div class="card-body">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal8">
                    <i class="fa fa-plus"></i> Tambah Order
                </button>
                <!-- The Modal -->
                <div class="modal" id="myModal8">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">{{$fb->nama_customer}}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="{{route('users.store_new')}}" method="post">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Originating</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" id="originating"
                                                name="originating" required><small class="form-text text-muted">*jika
                                                kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Terminating</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" id="terminating"
                                                name="terminating" required>
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
                                            <input type="number" class="form-control" placeholder="" id="kapasitas"
                                                name="kapasitas" required>
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
                            @foreach($layanan2 as $item)
                            <?php $no++ ?>
                            <tr>
                                <td>{{ $no  }}</td>
                                <td>{{ $item->originating }}</td>
                                <td>{{ $item->terminating }}</td>
                                <td>{{ $item->nama_layanan }}</td>
                                <td>{{ $item->kapasitas }}</td>
                                <td>

                                    <?php
                                        
                                        if($item->biaya_langganan == "0" ){
                                            echo'-';
                                        }
                                        else
                                            echo rupiah($item->biaya_langganan);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        
                                        if($item->biaya_instalasi == "0" ){
                                            echo'-';
                                        }
                                        else
                                            echo rupiah($item->biaya_instalasi);
                                    ?>
                                </td>
                                <td>
                                    <a href="/users/profile/bakbb/delete/{{$item->id}}" type="button" class="btn btn-danger btn-sm">
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
    <div class="col-md-8">
        <div class="">
            <div class="" style="float: right;">
                <a class="btn btn-success" id="button_next" onclick="konfirmasi()">Selanjutnya</a>
            </div>
        </div>
    </div>
</div>
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
                    window.location = "{{route('users.profile')}}";
                })
            }
        })
    }

</script>
@endpush