<?php 


function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    }
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}

?>

<div class="content">
<div style="float: right; color: grey; font-size: 8pt;margin-top: -15px; margin-bottom: 20px">Lampiran 1
</div>
<br>
<br>
<table style="font-size: 10pt;margin-left: 20px ;width: 95%; text-align: center;" border="0">
    <tr style="">
        <td><b>BERITA ACARA KESEPAKATAN BIAYA BERLANGGANAN</b></td>
    </tr>
</table>
<div style="padding-left: 20px">
    <div style="text-align: center;">
        <h3 class="judul" style="font-size: 10pt;">
        
        </h3>
    </div>
</div>
<br>
<table style="font-size: 8pt">
    <tr>
        <td style="padding-right: 100pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor</td>
        <td style="padding-right: 13pt">:</td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipe</td>
        <td>:</td>
        @foreach($customer as $c)
        <td>{{ucfirst($c->tipe)}}</td>
        @endforeach
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Perjanjian PIHAK PERTAMA</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Perjanjian PIHAK KEDUA</td>
        <td>:</td>
        <td></td>
    </tr>
</table>
@foreach($customer as $c)
<p style="font-size: 8pt; margin-left:20px;">
    Pada hari {{Date::parse($c->tgl_hari_ini)->format('l')}} ,tanggal {{Date::parse($c->tgl_hari_ini)->format('d')}} bulan {{Date::parse($c->tgl_hari_ini)->format('F')}} tahun <?php echo terbilang(Date::parse($c->tgl_hari_ini)->format('Y')); ?> ( {{Date::parse($c->tgl_hari_ini)->format('d')}}-{{Date::parse($c->tgl_hari_ini)->format('m')}}-{{Date::parse($c->tgl_hari_ini)->format('Y')}}), telah dilakukan
    kesepakatan biaya berlangganan  permintaan layanan baru atas Jaringan Telekomunikasi oleh dan antara
</p>
@endforeach
<table style="font-size: 8pt">
    <tr>
        <td style="padding-right: 20pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PIHAK PERTAMA</b></td>
        <td style="padding-right: 13pt;padding-left: 7pt;">:</td>
        <td><b>PT INDONESIA COMNETS PLUS</b></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Diwakili Oleh</td>
        <td style="padding-left: 7pt;">:</td>
        <td>Agus Widya Santoso</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan</td>
        <td style="padding-left: 7pt;">:</td>
        <td>Plt General Manager SBU Regional Jawa Bagian Timur</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alamat Kantor</td>
        <td style="padding-left: 7pt;">:</td>
        <td>Jl. Ketintang Baru 1 No. 1-3 Surabaya 60231</td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nomor Telepon & Faksimile
        </td>
        <td style="padding-left: 7pt;">:</td>
        <td>Telp (031) 827 3399 / 827 0033, Fax(031) 828 6611</td>
    </tr>
    <tr>
        <td style="padding-right: 50pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PIHAK KEDUA</b></td>
        <td style="padding-right: 13pt;padding-left: 7pt;">:</td>
        @foreach($customer as $c)
        <td><b>{{$c->nama_customer}}</b></td>
        @endforeach
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Diwakili Oleh</td>
        <td style="padding-left: 7pt;">:</td>
        @foreach($customer as $c)
        <td>{{$c->penanggung_jawab}}</td>
        @endforeach
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan</td>
        <td style="padding-left: 7pt;">:</td>
        @foreach($customer as $c)
        <td>{{$c->jabatan_penanggung_jawab}}</td>
        @endforeach
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alamat Kantor</td>
        <td style="padding-left: 7pt;">:</td>
        @foreach($customer as $c)
        <td style="text-transform: capitalize;">{{$c->alamat_kantor}}, {{ ucfirst(strtolower($c->desa)) }}, {{ ucfirst(strtolower($c->kecamatan)) }}, {{ ucfirst(strtolower($c->kota)) }}, {{ ucfirst(strtolower($c->provinsi)) }}&nbsp;{{$c->kode_pos}}</td>
        @endforeach
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nomor Telepon & Faksimile</td>
        <td style="padding-left: 7pt;">:</td>
        @foreach($customer as $c)
        <td>{{$c->no_telp}} & {{$c->no_fax}}</td>
        @endforeach
    </tr>
</table>
<div style="font-size: 8pt;margin-left:20px; margin-top: 10px;margin-bottom: 10px">Bahwa PIHAK KEDUA sepakat untuk menggunakan layanan dari PIHAK PERTAMA, sesuai dengan ketentuan di bawah ini:</div>
<table border="1" style="border-collapse: collapse; font-size: 7pt; width: 95%; margin-left:20px">
    <tr>
        <th style="height: 50px;">No</th>
        <th>Originating</th>
        <th>Terminating</th>
        <th>Jenis Layanan</th>
        <th>Kapasitas</th>
        <th>Biaya berlangganan/<br>bulan (Rp)</th>
        <th>Biaya Instalasi<br>(Rp)</th>
        <th>Media Lastmile/<br>Interface</th>
    </tr>
    <tr>
        <td colspan="8" style="padding-left: 10pt"><b>LAYANAN LAMA</b></td>
    </tr>
    <?php $total_langganan=0 ?>
    <?php $total_instalasi=0 ?>
    <?php $no=0 ?>
    @foreach($customer as $c)
        @foreach($c->oldorder as $o)
        <?php $no++ ?>
        <tr>
            <td style="height: 20px;">{{ $no }}</td>
            <td>{{$o->originating}}</td>
            <td>{{$o->terminating}}</td>
            <td>{{$o->nama_product}}</td>
            <td>{{$o->kapasitas}}</td>
            <td>@currency($o->biaya_langganan)</td>
            <td>@currency($o->biaya_instalasi)</td>
            <td>Fiber Optic/<br>Ethernet</td>
            <?php $total_langganan += $o->biaya_langganan ?>
            <?php $total_instalasi += $o->biaya_instalasi ?>
        </tr>
        @endforeach
    @endforeach
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Total Biaya Berlangganan/Bulan : </b></td>
        <td>&nbsp;</td>
        <th>@currency($total_langganan)</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Total Biaya Instalasi : </b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th>@currency($total_instalasi)</th>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="8" style="padding-left: 10pt"><b>LAYANAN BARU</b></td>
    </tr>
    <?php $total_langganan1=0 ?>
    <?php $total_instalasi1=0 ?>
    <?php $no=0 ?>
    @foreach($customer as $c)
        @foreach($c->order as $o)
        <?php $no++ ?>
        <tr>
            <td style="height: 20px;">{{ $no }}</td>
            <td>{{$o->originating}}</td>
            <td>{{$o->terminating}}</td>
            <td>{{$o->nama_product}}</td>
            <td>{{$o->kapasitas}}</td>
            <td>@currency($o->biaya_langganan)</td>
            <td>@currency($o->biaya_instalasi)</td>
            <td>Fiber Optic/<br>Ethernet</td>
            <?php $total_langganan1 += $o->biaya_langganan ?>
            <?php $total_instalasi1 += $o->biaya_instalasi ?>
        </tr>
        @endforeach
    @endforeach
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Total Biaya Berlangganan/Bulan : </b></td>
        <td>&nbsp;</td>
        <th>@currency($total_langganan1)</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Total Biaya Instalasi : </b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th>@currency($total_instalasi1)</th>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Jangka Waktu Berlangganan : </b></td>
        <td>&nbsp;</td>
        <td colspan="3" style="text-align: center;"><b>12 (dua belas) Bulan</b></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Tanggal Mulai Penagihan </b></td>
        <td>&nbsp;</td>
        @foreach($customer as $c)
        <td colspan="3" style="text-align: center;"><b>{{$c->tgl_penagihan}}</b></td>
        @endforeach
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Nomor Rekening </b></td>
        <td>&nbsp;</td>
        <td colspan="3" style="text-align: center;">
            <b>
                Virtual Account :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                BANK MANDIRI KCP PLN KANTOR PUSAT, Jakarta
            </b>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b>Alamat Penagihan </b></td>
        <td>&nbsp;</td>
        @foreach($customer as $c)
        <th colspan="3">{{$c->alamat_kantor}}, {{ ucfirst(strtolower($c->desa)) }}, {{ ucfirst(strtolower($c->kecamatan)) }}, {{ ucfirst(strtolower($c->kota)) }}, {{ ucfirst(strtolower($c->provinsi)) }}&nbsp;{{$c->kode_pos}}</th>
        @endforeach
    </tr>

</table>
<div style="font-size: 8pt">
    <p>
        <table style="justify-content: right;width: 95%" border="0">
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Syarat dan Kondisi:</b><br></td>
            </tr>   
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                <td>Seluruh biaya belum termasuk PPN dan pajak-pajak lainnya serta biaya di lokasi gedung
                    (tergantung perijinan lokasi gedung);</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                <td>Berita Acara Kesepakatan Biaya Berlangganan ini dapat dijadikan sebagai dasar penagihan dan
                    pembayaran Biaya Berlangganan PIHAK PERTAMA kepada PIHAK KEDUA;</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                <td>Penagihan Biaya Berlangganan dilakukan per bulan dan ditagihkan di awal pemakaian layanan
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                <td>Apabila PIHAK KEDUA membatalkan berlangganan setelah menandatangani Berita Acara Kesepakatan
                    Biaya Berlangganan, maka Biaya Instalasi yang telah dibayarkan PIHAK KEDUA kepada PIHAK
                    PERTAMA tidak dapat ditarik kembali dan biaya perijinan sepenuhnya menjadi tanggung jawab
                    PIHAK KEDUA;</td>
            </tr>
        </table>
        
        <table style="width: 95%; margin-left: 20px; margin-top: 5px;page-break-before:  always;">
            <tr>
                <td>
                    Demikian Berita Acara Kesepakatan Biaya Berlangganan ini dibuat dalam rangkap 2 (dua), asli dan
                    mempunyai kekuatan hukum yang sama setelah ditandatangani dan merupakan bagian tidak terpisahkan dari
                    Perjanjian antara PIHAK PERTAMA dan PIHAK KEDUA.
                </td>
            </tr>
        </table>
        

    </p>
</div>
<table style="width: 100%; font-size: 9pt">
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr style="">
        <th>PIHAK PERTAMA</th>
        <th>&nbsp;</th>
        <th>PIHAK KEDUA</th>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr> 
    <tr>
        <th>(Agus Widya Santoso)</th>
        <th>&nbsp;</th>
        @foreach($customer as $c)
        <th>( {{$c->penanggung_jawab}} )</th>
        @endforeach
    </tr>
</table>
</div>