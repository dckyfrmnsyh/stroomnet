@extends('layouts.app')
@section('content')
<section class="about" id="tambah_pelanggan_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">TAMBAH PELANGGAN</h1>
                    </div>
                    <div class="card-body">

                        <form id="regForm" action="{{ route('customer.store') }}" method="post">
                            {{ csrf_field() }}

                            <!-- tab 1 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label" for="nama">Nama Customer
                                            (Instansi)</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nama_customer">
                                            <small class="form-text text-muted">ex. PT KU</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- tab 2 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="card-header" style="text-align: center; margin: 20px;">Data
                                        Penanggung Jawab</div>

                                    <div class="form-group row">
                                        <label class="col-md-5">Diwakili Oleh/Penanggungjawab</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="penanggungjawab">
                                            <small class="form-text text-muted">ex. Doni Pramuda</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">Jabatan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="jabatan_penanggungjawab">
                                            <small class="form-text text-muted">ex. General Manager</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">Nomor KTP</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nomor_ktp_penanggungjawab">
                                            <small class="form-text text-muted">ex. 032851287621861</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">Tempat, Tanggal Lahir</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="tempat_lahir">
                                            <small class="form-text text-muted">ex. Surabaya</small>
                                        </div>
                                        <div class="col-md-4" style="float: right;">
                                            <input type="date" class="form-control" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Alamat Kantor</label>
                                        <div class="col-md-3">
                                            <select name="province" id="province" class="form-control">
                                                <option value="">== Select Province ==</option>
                                                @foreach ($provinces as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="regencies" id="regencies" class="form-control">
                                                <option value="">== Select City ==</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5"></label>
                                        <div class="col-md-3">
                                            <select name="districts" id="districts" class="form-control">
                                                <option value="">== Select District ==</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="villages" id="villages" class="form-control">
                                                <option value="">== Select Villages ==</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5"></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="alamat_kantor" placeholder="">
                                            <small class="form-text text-muted">ex. Jl. raya kemayoran No.102A</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">KODE POS</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="kode_pos">
                                            <small class="form-text text-muted">ex. 66125</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Nomor HP</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nomor_hp">
                                            <small class="form-text text-muted">ex. 0822781551 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Email Penanggungjawab</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email_penanggungjawab">
                                            <small class="form-text text-muted">ex. mail@gmail.com *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab">
                                <div class="form-group">
                                    <div class="card-header" style="text-align: center; margin: 20px;">Data
                                        Perusahaan</div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">No Telp Kantor</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="no_telp">
                                            <small class="form-text text-muted">ex. 09210719242 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">No Fax Kantor</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="no_fax">
                                            <small class="form-text text-muted">ex. 02189619 *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Grup Instansi</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="grup_instansi">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Nama Brand</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="nama_brand">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Jenis Usaha / Segmen</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="jenis_usaha">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Alamat Email
                                            Perusahaan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder=""
                                                name="email_perusahaan">
                                            <small class="form-text text-muted">ex. mail@gmail.com *jika kosong isi
                                                (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">No NPWP Perusahaan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder=""
                                                name="npwp_perusahaan">
                                            <small class="form-text text-muted">ex. 902107173421 *jika kosong isi
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
                                        <label class="col-md-5 col-form-label">Nama PIC Keuangan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="pic_keuangan">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Jabatan / Department</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder=""
                                                name="jabatan_keuangan">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Email PIC Keuangan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder=""
                                                name="email_keuangan">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">No HP PIC Keuangan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="no_keuangan">
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
                                        <label class="col-md-5 col-form-label">Nama PIC Teknis</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="pic_teknis">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Jabatan / Department</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder=""
                                                name="jabatan_teknis">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">Email PIC Teknis</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="email_teknis">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label">No HP PIC Teknis</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="" name="no_teknis">
                                            <small class="form-text text-muted">*jika kosong isi (-)</small>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right; padding-top: 10px">

                                    <div class="" style="float: left; padding-right: 20px">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"
                                            class="btn btn-danger">Kembali</button>
                                    </div>
                                    <div class="" style="float: right;">
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
