@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Sales Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Sales Dashboard</a></li>
                        <li class="active">Sales Dashboard</li>
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
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card" style="margin-top:10px;">
                    <div class="card-body">
                        <div class="row justify-content-between" style="margin-bottom:-20px">
                            <div class="col-4">
                                <h4 class="box-title">Sales dashboard
                                    <a  data-toggle="modal" data-target="#myModal1" href="#" class="btn btn-sm btn-success">
                                        <i class='fa fa-download'></i> 
                                        Export to Excel
                                    </a>
                                </h4>
                            </div>
                            <div class="col-4">
                                <div class="row form-group">
                                    <select class="col-4 form-control" style="width: 120px;" id="month" name="month">
                                        <option value='1' selected>January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                    <select name="dropdownYear" class="col-4 form-control" id="dropdownYear" style="width: 120px;" onchange="getProjectReportFunc()"></select>
                                    <button id="test" class="col-4 btn btn-primary btn-sm"> Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-responsive table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sales</th>
                                        <th>Created Months</th>
                                        <th>Revenue Monthly</th>
                                        <th>Instalasi</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="something">
                                    
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.orders -->
    <!-- The Modal -->
    <div class="modal" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Export to Excel</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav justify-content-center nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Month & Year Filter</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Month range Filter </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">All Month Filter </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <form action="/excel/sales/dashboard" method="get">
                                    {{ csrf_field() }}
                                    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">Pilih bulan dan tahun terlebih dahulu</div>
                                    <div class="form-group row justify-content-center">
                                        <select class="col-4 form-control" style="width: 120px;" id="month1" name="month1">
                                            <option value='1' selected>January</option>
                                            <option value='2'>February</option>
                                            <option value='3'>March</option>
                                            <option value='4'>April</option>
                                            <option value='5'>May</option>
                                            <option value='6'>June</option>
                                            <option value='7'>July</option>
                                            <option value='8'>August</option>
                                            <option value='9'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                        </select>
                                        <select name="year" class="col-4 form-control" id="year" style="width: 120px;"></select>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right"><i class='fa fa-download'></i>  Export to Excel</button>
                                </form>
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                            <form action="/excel/sales/filter2" method="get">
                                {{ csrf_field() }}
                                <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">Pilih tanggal awal dan akhir </div>
                                <div class="form-group row justify-content-center">
                                    <label for="date1" class="col-6">Tanggal Awal</label>
                                    <label for="date2" class="col-6">Tanggal Akhir</label>
                                    <input class="col-6 form-control" type="date" name="date1" value="" required/>                                        
                                    <input class="col-6 form-control" type="date" name="date2" value=""required/>                                        
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class='fa fa-download'></i>  Export to Excel</button>
                            </form>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                            <form action="/excel/sales/filter3" method="get">
                                {{ csrf_field() }}
                                <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">Pilih "All Years" untuk export seluruh data atau pilih berdasarkan spesifik tahun</div>
                                <div class="form-group row justify-content-center">
                                    <select name="year01" class="col-4 form-control" id="year01" style="width: 120px;"></select>
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class='fa fa-download'></i>  Export to Excel</button>
                            </form>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- .animated -->
@endsection

@push('before-style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('after-script')

<script>
    $(document).ready(function () {
        $('#dropdownYear').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            year = 2019;
            var length = (current-year)+3;
            for (var i = 0; i < length; i++) {
                if ((year+i) == current)
                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                else
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
            }

        });
        $('#year').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            year = 2019;
            var length = (current-year)+3;
            for (var i = 0; i < length; i++) {
                if ((year+i) == current)
                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                else
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
            }

        });
        $('#year01').each(function() {
            var year = (new Date()).getFullYear();
            var current = year;
            year = 2019;
            var length = (current-year)+3;
            $(this).append('<option value="' + (0) + '">' + 'All Years'+ '</option>');
            for (var i = 0; i < length; i++) {
                if ((year+i) == current)
                    $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
                else
                    $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
            }

        });

        function convertToRupiah(angka)
        {
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        fetch_data();

        function fetch_data(mm = '', yy = ''){
            $.ajax({
                url: '/Admin/sales/date/filter',
                type: 'GET',
                data: { mm:mm, yy:yy },
                success: function(response)
                {
                    // alert("sss");
                    var values = $.parseJSON(response);
                    var i = 1;
                    var output = '';
                    const monthNames = ["All Month","January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                    ];
                    @foreach($sales as $row)
                        output += '<tr>';
                        output += '<td>' + i++ + '</td>';
                        output += '<td>' + '{{$row->name}}' + '</td>';
                        output += '<td>' + monthNames[values.bulan]+' '+values.tahun + '</td>';
                        output += '<td>' + convertToRupiah(values.revenue[{{$row->id}}]) + '</td>';
                        output += '<td>' + convertToRupiah(values.instalasi[{{$row->id}}]) + '</td>';
                        output += '<td>' + convertToRupiah(values.total[{{$row->id}}]) + '</td></tr>';
                    @endforeach
                    $('#something').html(output);
                }
            });
        }
        
        $('#test').click(function(){
            var mm = $('#month').val();
            var yy = $("#dropdownYear").val();
            console.log(mm);
            console.log(yy);
            if(mm != '' &&  yy != ''){
                fetch_data(mm, yy);
            }
            
        });

    });




</script>
@endpush
