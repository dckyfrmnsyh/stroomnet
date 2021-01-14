@extends('layouts.user')
@section('sidebar')
@include('users.profile.sidebar')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mt-4">Create FB</h1>
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Form Berlangganan</h1>
            </div>
            <div class="card-body">

                <form id="regForm" action="{{route('users.storefb')}}" method="post">
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
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label" for="nomor_fb">Nomor</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nomor_fb">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label" for="tgl_billing">Tanggal</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="tgl_billing">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label" for="virtual_account">Virtual Account</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="virtual_account">
                                    <small class="form-text text-muted">ex. 82389343279371</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label" for="virtual_account">Pilih Sales</label>
                                <div class="col-md-6">
                                    <select name="sales" id="sales" class="form-control">
                                        <option value="">== Select Sales ==</option>
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
                                <label class="col-md-5 col-form-label">Grup Instansi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="grup">
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
                                <label class="col-md-5 col-form-label">Alamat Kantor</label>
                                <div class="col-md-3">
                                    <select name="provinsi" id="province" class="form-control">
                                        <option value="">== Select Province ==</option>
                                        @foreach ($provinces as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="kota" id="regencies" class="form-control">
                                        <option value="">== Select City ==</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5"></label>
                                <div class="col-md-3">
                                    <select name="kecamatan" id="districts" class="form-control">
                                        <option value="">== Select District ==</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="desa" id="villages" class="form-control">
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
                                <label class="col-md-5 col-form-label">Alamat Situs</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="alamat_situs">
                                    <small class="form-text text-muted">ex. http://google.com *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Alamat Email
                                    Perusahaan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="email_perusahaan">
                                    <small class="form-text text-muted">ex. mail@gmail.com *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No NPWP Perusahaan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="npwp_perusahaan">
                                    <small class="form-text text-muted">ex. 902107173421 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Telp Kantor</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_telp">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_telp">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Fax Kantor</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_fax">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_fax">
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
                                <label class="col-md-5">Diwakili Oleh/Penanggungjawab</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="penanggung_jawab">
                                    <small class="form-text text-muted">ex. Doni Pramuda</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5">Tempat, Tanggal Lahir</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="tempat_lahir">
                                    <small class="form-text text-muted">ex. Surabaya</small>
                                </div>
                                <div class="col-md-4" style="float: right;">
                                    <input type="date" class="form-control" name="tgl_lahir">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5">Jabatan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="jabatan_pj">
                                    <small class="form-text text-muted">ex. General Manager</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Telp Kantor</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_telp_pj">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_telp_pj">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Fax Kantor</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_fax_pj">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_fax_pj">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5">ID CARD</label>
                                <div class="col-md-6">
                                    <select name="id_card_pj" id="id_card_pj" class="form-control">
                                        <option value="KTP">KTP</option>
                                        <option value="KIM-S">KIM-S</option>
                                        <option value="SIM">SIM</option>
                                        <option value="PASPOR">PASPOR</option>
                                    </select>
                                    <small class="form-text text-muted">choose 1</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5">No. ID CARD</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="no_id_card_pj">
                                    <small class="form-text text-muted">ex. 032851287621861</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5">Masa Berlaku ID CARD</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="valid_until_card_pj">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Email Penanggungjawab</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email_pj">
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
                                <label class="col-md-5 col-form-label">Nama PIC Keuangan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="nama_keuangan">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Bagian / Department</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="bagian_keuangan">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Jabatan / Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="jabatan_keuangan">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Telp Keuangan</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_telp_keuangan">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_telp_keuangan">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Fax Keuangan</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_fax_keuangan">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_fax_keuangan">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Email PIC Keuangan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="email_keuangan">
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
                                    <input type="text" class="form-control" placeholder="" name="nama_teknis">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Bagian / Department</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="bagian_teknis">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Jabatan / Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="jabatan_teknis">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Telp Teknis</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_telp_teknis">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_telp_teknis">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No Fax Teknis</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="code_fax_teknis">
                                    <small class="form-text text-muted">kode area ex. 031 </small>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_fax_teknis">
                                    <small class="form-text text-muted">ex. 8942901 *jika kosong isi
                                        (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">No. Handphone PIC teknis</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="no_hp_teknis">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Email PIC teknis</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="email_teknis">
                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label>Status Publish</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
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
@endsection
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
