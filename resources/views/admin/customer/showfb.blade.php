@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Customer</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/Admin/customer">Customer</a></li>
                        <li class="active">Show and Edit FB</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="about" id="tambah_pelanggan_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="margin-bottom:20px;">
                <div class="text-center" style="margin-bottom:20px;">
                    
                </div>
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div id="myDIV">
                        @include('includes.pdf3')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center" style="margin-bottom:20px;">
                    <button onclick="edit()" class="btn btn-outline-primary">Edit data</button>
                </div>
                <div class="card  form-edit" id="form-edit">
                    <div class="card-header">
                        <h1 class="text-center">Form Berlangganan</h1>
                    </div>
                    <div class="card-body">

                        <form id="regForm" action="/Admin/customer/update/FB/{{$customer->id}}" method="post">
                            {{ csrf_field() }}

                            <!-- tab 1 -->
                            <div class="tab">
                                <div class="form-group">
                                
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Status Publish</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select name="status" id="status" class="form-control">
                                                <option value="{{ old('status') ? old('status') : $data->status }}">{{$data->status}}</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md col-form-label" for="nama">Nama Customer
                                            (Instansi)</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="nama_customer" 
                                            value="{{ old('nama_customer') ? old('nama_customer') : $data->nama_customer }}">
                                            <small class="form-text text-muted">ex. PT KU</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label" for="nomor_fb">Nomor</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="nomor_fb" 
                                            value="{{ old('nomor_fb') ? old('nomor_fb') : $data->nomor_fb }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label" for="tgl_billing">Tanggal</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" name="tgl_billing" 
                                            value="{{ old('tgl_billing') ? old('tgl_billing') : $data->tgl_billing }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label" for="virtual_account">Virtual Account</label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control" name="virtual_account" 
                                            value="{{ old('virtual_account') ? old('virtual_account') : $data->virtual_account }}">
                                            <small class="form-text text-muted">ex. 82389343279371</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label" for="virtual_account">Pilih Sales</label>
                                        <div class="col-md-12">
                                            <select name="sales" id="sales" class="form-control">
                                                <option 
                                                value="{{ old('sales') ? old('sales') : $data->id_sales ?? '--Pilih Sales--' }}">
                                                {{$nama_sales ?? '--Pilih Sales--'}}</option>
                                                @foreach ($sales as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">Sesuaikan Sales</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- tab 2 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="card-header" style="text-align: center; margin: 20px;">Data
                                        Perusahaan</div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Grup Instansi</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="" name="grup"
                                            value="{{ old('grup') ? old('grup') : $data->grup }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Nama Brand</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="" name="nama_brand"
                                            value="{{ old('nama_brand') ? old('nama_brand') : $data->nama_brand }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Jenis Usaha / Segmen</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="" name="jenis_usaha"
                                            value="{{ old('jenis_usaha') ? old('jenis_usaha') : $data->jenis_usaha }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Alamat Kantor</label>
                                        <div class="col-md-6">
                                            <select name="provinsi" id="province" class="form-control">
                                                <option 
                                                value="{{ old('provinsi') ? old('provinsi') : $provinsi->id }}">
                                                {{$provinsi->name}}</option>
                                                @foreach ($provinces as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="kota" id="regencies" class="form-control">
                                                <option 
                                                value="{{ old('kota') ? old('kota') : $kota->id }}"
                                                >{{$kota->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-6">
                                            <select name="kecamatan" id="districts" class="form-control">
                                                <option 
                                                value="{{ old('kecamatan') ? old('kecamatan') : $kecamatan->id }}"
                                                >{{$kecamatan->name}}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="desa" id="villages" class="form-control">
                                                <option 
                                                value="{{ old('desa') ? old('desa') : $desa->id }}"
                                                >{{$desa->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12"></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="alamat_kantor" placeholder=""
                                            value="{{ old('alamat_kantor') ? old('alamat_kantor') : $data->alamat_kantor }}">
                                            <small class="form-text text-muted">ex. Jl. raya kemayoran No.102A</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">KODE POS</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="kode_pos"
                                            value="{{ old('kode_pos') ? old('kode_pos') : $data->kode_pos }}">
                                            <small class="form-text text-muted">ex. 66125</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Alamat Situs</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="alamat_situs"
                                            value="{{ old('alamat_situs') ? old('alamat_situs') : $data->alamat_situs }}">
                                            <small class="form-text text-muted">ex. http://google.com *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Alamat Email
                                            Perusahaan</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="email_perusahaan"
                                                value="{{ old('email_perusahaan') ? old('email_perusahaan') : $data->email_perusahaan }}">
                                            <small class="form-text text-muted">ex. mail@gmail.com *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No NPWP Perusahaan</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="npwp_perusahaan"
                                                value="{{ old('npwp_perusahaan') ? old('npwp_perusahaan') : $data->npwp_perusahaan }}">
                                            <small class="form-text text-muted">ex. 902107173421 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Telp Kantor</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_telp"
                                            value="{{ old('code_telp') ? old('code_telp') : $data->code_telp }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_telp"
                                            value="{{ old('no_telp') ? old('no_telp') : $data->no_telp }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Fax Kantor</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_fax"
                                            value="{{ old('code_fax') ? old('code_fax') : $data->code_fax }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_fax"
                                            value="{{ old('no_fax') ? old('no_fax') : $data->no_fax }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="card-header" style="text-align: center; margin: 20px;">Data
                                        Penanggung Jawab</div>

                                    <div class="form-group row">
                                        <label class="col-md-12">Diwakili Oleh/Penanggungjawab</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="penanggung_jawab"
                                            value="{{ old('penanggung_jawab') ? old('penanggung_jawab') : $data->penanggung_jawab }}">
                                            <small class="form-text text-muted">ex. Doni Pramuda</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12">Tempat, Tanggal Lahir</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ old('tempat_lahir') ? old('tempat_lahir') : $data->tempat_lahir }}">
                                            <small class="form-text text-muted">ex. Surabaya</small>
                                        </div>
                                        <div class="col-md-8" style="float: right;">
                                            <input type="date" class="form-control" name="tgl_lahir"
                                            value="{{ old('tgl_lahir') ? old('tgl_lahir') : $data->tgl_lahir }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12">Jabatan</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="jabatan_pj"
                                            value="{{ old('jabatan_pj') ? old('jabatan_pj') : $data->jabatan_pj }}">
                                            <small class="form-text text-muted">ex. General Manager</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Telp Kantor</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_telp_pj"
                                            value="{{ old('code_telp_pj') ? old('code_telp_pj') : $data->code_telp_pj }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_telp_pj"
                                            value="{{ old('no_telp_pj') ? old('no_telp_pj') : $data->no_telp_pj }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Fax Kantor</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_fax_pj"
                                            value="{{ old('code_fax_pj') ? old('code_fax_pj') : $data->code_fax_pj }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_fax_pj"
                                            value="{{ old('no_fax_pj') ? old('no_fax_pj') : $data->no_fax_pj }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12">ID CARD</label>
                                        <div class="col-md-12">
                                            <select name="id_card_pj" id="id_card_pj" class="form-control">
                                                <option 
                                                value="{{ old('id_card_pj') ? old('id_card_pj') : $data->id_card_pj }}"
                                                >{{$data->id_card_pj}}</option>
                                                <option value="KTP">KTP</option>
                                                <option value="KIM-S">KIM-S</option>
                                                <option value="SIM">SIM</option>
                                                <option value="PASPOR">PASPOR</option>
                                            </select>
                                            <small class="form-text text-muted">choose 1</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12">No. ID CARD</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="no_id_card_pj"
                                            value="{{ old('no_id_card_pj') ? old('no_id_card_pj') : $data->no_id_card_pj }}">
                                            <small class="form-text text-muted">ex. 032851287621861</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12">Masa Berlaku ID CARD</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" name="valid_until_card_pj"
                                            value="{{ old('valid_until_card_pj') ? old('valid_until_card_pj') : $data->valid_until_card_pj }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Email Penanggungjawab</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="email_pj"
                                            value="{{ old('email_pj') ? old('email_pj') : $data->email_pj }}">
                                            <small class="form-text text-muted">ex. mail@gmail.com *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- tab 4 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="card-header" style="text-align: center; margin: 20px;">Data
                                        Keuangan</div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Nama PIC Keuangan</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="" name="nama_keuangan"
                                            value="{{ old('nama_keuangan') ? old('nama_keuangan') : $data->nama_keuangan }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Bagian / Department</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="bagian_keuangan"
                                                value="{{ old('bagian_keuangan') ? old('bagian_keuangan') : $data->bagian_keuangan }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Jabatan / Position</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="jabatan_keuangan"
                                                value="{{ old('jabatan_keuangan') ? old('jabatan_keuangan') : $data->jabatan_keuangan }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Telp Keuangan</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_telp_keuangan"
                                            value="{{ old('code_telp_keuangan') ? old('code_telp_keuangan') : $data->code_telp_keuangan }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_telp_keuangan"
                                            value="{{ old('no_telp_keuangan') ? old('no_telp_keuangan') : $data->no_telp_keuangan }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Fax Keuangan</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_fax_keuangan"
                                            value="{{ old('code_fax_keuangan') ? old('code_fax_keuangan') : $data->code_fax_keuangan }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_fax_keuangan"
                                            value="{{ old('no_fax_keuangan') ? old('no_fax_keuangan') : $data->no_fax_keuangan }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Email PIC Keuangan</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="email_keuangan"
                                                value="{{ old('email_keuangan') ? old('email_keuangan') : $data->email_keuangan }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 5 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="card-header" style="text-align: center; margin: 20px;">Data
                                        Teknis</div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Nama PIC Teknis</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="" name="nama_teknis"
                                            value="{{ old('nama_teknis') ? old('nama_teknis') : $data->nama_teknis }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Bagian / Department</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="bagian_teknis"
                                                value="{{ old('bagian_teknis') ? old('bagian_teknis') : $data->bagian_teknis }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Jabatan / Position</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="jabatan_teknis"
                                                value="{{ old('jabatan_teknis') ? old('jabatan_teknis') : $data->jabatan_teknis }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Telp Teknis</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_telp_teknis"
                                            value="{{ old('code_telp_teknis') ? old('code_telp_teknis') : $data->code_telp_teknis }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_telp_teknis"
                                            value="{{ old('no_telp_teknis') ? old('no_telp_teknis') : $data->no_telp_teknis }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No Fax Teknis</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="code_fax_teknis"
                                            value="{{ old('code_fax_teknis') ? old('code_fax_teknis') : $data->code_fax_teknis }}">
                                            <small class="form-text text-muted">kode area ex. 031 </small>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="no_fax_teknis"
                                            value="{{ old('no_fax_teknis') ? old('no_fax_teknis') : $data->no_fax_teknis }}">
                                            <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">No. Handphone PIC teknis</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="no_hp_teknis"
                                                value="{{ old('no_hp_teknis') ? old('no_hp_teknis') : $data->no_hp_teknis }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label">Email PIC teknis</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder=""
                                                name="email_teknis"
                                                value="{{ old('email_teknis') ? old('email_teknis') : $data->email_teknis }}">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="overflow:auto;">
                                <div style="padding-top: 10px">

                                    <div class="float-left" style=" padding-left: 50px">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"
                                            class="btn btn-danger">Kembali</button>
                                    </div>
                                    <div class="float-right" style="padding-right: 50px">
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)"
                                            class="btn btn-primary">Selanjutnya</button>
                                    </div>

                                </div>
                            </div>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('before-script')

<script>
    function edit() {
        var y = document.getElementById("form-edit");
        if (y.style.display === "none") {
            y.style.display = "inline-block";
        } else {
            y.style.display = "none";
        }
    }
</script>

@endpush
@push('after-script')

<script>
    // ALAMAT

    $(document).ready(function () {
        $('#province').on('change', function (e) {
            var id = e.target.value;
            $.get('{{ url('users/alamat/kota')}}/' + id,
                function (data) {
                    console.log(id);
                    console.log(data);
                    $('#regencies').empty();
                    $('#districts').empty();
                    $('#villages').empty();
                    $('#regencies').append(new Option("Select Kab/Kota", ""));
                    $('#districts').append(new Option("Select Kecamatan", ""));
                    $('#villages').append(new Option("Select Desa", ""));
                    $.each(data, function (index, element) {
                        $('#regencies').append(new Option(element.name, element.id));
                    });
                });
        });
        $('#regencies').on('change', function (e) {
            var id = e.target.value;
            $.get('{{ url('users/alamat/kec')}}/' + id,
                function (data) {
                    console.log(id);
                    console.log(data);
                    $('#districts').empty();
                    $('#districts').append(new Option("Select Kecamatan", ""));
                    $('#villages').empty();
                    $('#villages').append(new Option("Select Desa", ""));
                    $.each(data, function (index, element) {
                        $('#districts').append(new Option(element.name, element.id));
                    });
                });
        });
        $('#districts').on('change', function (e) {
            var id = e.target.value;
            $.get('{{ url('users/alamat/desa')}}/' + id,
                function (data) {
                    console.log(id);
                    console.log(data);
                    $('#villages').empty();
                    $('#villages').append(new Option("Select Desa", ""));
                    $.each(data, function (index, element) {
                        $('#villages').append(new Option(element.name, element.id));
                    });
                });
        });

    });

    // ALAMAT-END

</script>
<script type="text/javascript">
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Simpan";
        } else {
            document.getElementById("nextBtn").innerHTML = "Selanjutnya";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }

</script>
@endpush

@push('before-style')
<style>
#myDiv{
    min-height: 60vh;
    padding:5%;
    width: inherit;
    margin: auto;
    margin-top:40px;
    margin-bottom:10px;
    background-color: white;
    box-shadow: 2px 3px 2px 3px #a3a3a34f;
}
#form-edit{
    display:none;
}
</style>

@push('after-style')
<style>
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }


</style>
@endpush
