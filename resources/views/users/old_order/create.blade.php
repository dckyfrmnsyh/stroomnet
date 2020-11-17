@extends('layouts.app')
@section('content')
<section class="about" id="tambah_pelanggan_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">TAMBAH ORDER <br> {{$customer->nama_customer}} </h1>
                    </div>
                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">
                            <i class="fa fa-plus"></i> Tambah Order Baru
                        </button>


                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$customer->nama_customer}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{ route('order.old_store_2') }}" method="post">
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
                        <div class="modal" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">baru{{$customer->nama_customer}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{ route('order.old_store') }}" method="post">
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
                        <div class="form-group">
                            <div class="">
                                <div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="4"></th>
                                                <th>Layanan Baru</th>
                                                <th colspan="4"></th>
                                            </tr>
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
                                            @foreach ($order as $p)
                                            <?php $no++ ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $p->originating }}</td>
                                                <td>{{ $p->terminating }}</td>
                                                <td>{{ $p->nama_product }}</td>
                                                <td>{{ $p->kapasitas }}</td>
                                                <td>@currency($p->biaya_langganan)</td>
                                                <td>@currency($p->biaya_instalasi)</td>
                                                <td>
                                                    <a href="/users/old/order/delete/2/{{ $p->id }}" type="button"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br><br>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#myModal">
                                        <i class="fa fa-plus"></i> Tambah Order Lama
                                    </button>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="4"></th>
                                                <th>Layanan Lama</th>
                                                <th colspan="4"></th>
                                            </tr>
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
                                            @foreach ($old_order as $ol)
                                            <?php $no++ ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $ol->originating }}</td>
                                                <td>{{ $ol->terminating }}</td>
                                                <td>{{ $ol->nama_product }}</td>
                                                <td>{{ $ol->kapasitas }}</td>
                                                <td>@currency($ol->biaya_langganan)</td>
                                                <td>@currency($ol->biaya_instalasi)</td>
                                                <td>
                                                    <a href="/users/old/order/delete/{{ $ol->id }}" type="button"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- end of tampilan -->
                    </div>
                    <div class="card-footer">
                        <div class="" style="float: right;">
                            <a class="btn btn-primary" type="button" id="button_next"
                                onclick="konfirmasi1()">Selanjutnya</a>

                        </div>
                    </div>
                </div>
            </div>
           <div class="col-md-3">
                <form action="{{ route('penagihan.store') }}" method="post">
                        {{ csrf_field() }}
                    <!-- tgl mulai penagihan -->
                    <div class="card"  style="text-align:center;">
                        <div class="card-header">
                            <h4> <br> </h4>
                        </div>
                        <div class="card-body">
                                <label>Jangka Waktu Berlangganan</label> 
                            <div class="form-group row justify-content-center" >
                                <div class="col-md-5">
                                    <input type="number" class="form-control" id=""
                                            name="jangka_waktu" value="{{ old('jangka_waktu') ? old('jangka_waktu') : $customer->jangka_waktu }}" required>
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control" type="text" name="" value="Bulan" disabled>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label>Tanggal Mulai Penagihan</label>
                                <div>
                                    <select class="form-control col-md" name="">
                                        <option value="Tanggal">tanggal</option>
                                        <option value="text">text</option>
                                    </select>    
                                    <br>
                                </div>
                                
                                <div class="col-md ">
                                    <input type="date" class="form-control" id="tgl_penagihan"
                                        name="tgl_penagihan" value="{{ old('tgl_penagihan') ? old('tgl_penagihan') : $customer->tgl_penagihan }}" required>
                                </div>
                            </div>
                        </div>                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>                        
                    </div>
                    <!-- end of tgl mulai penagihan -->
                </form> 
            </div>
        </div>
    </div>
</section>
@endsection
