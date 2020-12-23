<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-eqiuv="X-UA-Compatible" content="ie=edge">
    <title>Form Isi BAKBB</title>

    <style>
        .content {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin-bottom: -50px;
        }

        .breakNow {
            page-break-inside: avoid;
            page-break-after: always;
            margin-top: 50px;

        }

    </style>
</head>

<body style="font-family: Arial">

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

    function rupiah($angka){
        $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
        return $hasil_rupiah;                                                                                   
    }
	
?>

    <div class="content">
        <div style="float: right; color: grey; font-size: 8pt;margin-top: -15px; margin-bottom: 20px">Lampiran 1
        </div><br>
        <!-- hitung -->
        <div id="hitung" class="hitung" style="">
            <div>
                <center>
                    <h3 class="judul" style="font-size: 10pt;margin-left:20px;margin-bottom:-7px;">
                        BERITA ACARA KESEPAKATAN BIAYA BERLANGGANAN
                    </h3>
                </center>
            </div>
            <br>
            <table border="0" style="border-collapse: collapse;font-size: 8pt">
                <tr>
                    <td style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor</td>
                    <td style="width:30px">:</td>
                    <td>
                    {{$list_order->order_data->nomor}}
                    </td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipe</td>
                    <td>:</td>
                    <td>{{$list_order->order_data->tipe}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Perjanjian PIHAK PERTAMA</td>
                    <td>:</td>
                    <td>{{$list_order->order_data->no_pihak_pertama}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Perjanjian PIHAK KEDUA</td>
                    <td>:</td>
                    <td>{{$list_order->order_data->no_pihak_kedua}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <p style="font-size: 8pt; margin-left:20px;">
                            Pada hari {{Date::parse($list_order->order_data->tanggal_penagihan)->format('l')}} ,tanggal
                            {{Date::parse($list_order->order_data->tanggal_penagihan)->format('d')}} bulan {{Date::parse($list_order->order_data->tanggal_penagihan)->format('F')}} tahun
                            <?php echo terbilang(Date::parse($list_order->order_data->tanggal_penagihan)->format('Y')); ?> (
                            {{Date::parse($list_order->order_data->tanggal_penagihan)->format('d')}}-{{Date::parse($list_order->order_data->tanggal_penagihan)->format('m')}}-{{Date::parse($list_order->order_data->tanggal_penagihan)->format('Y')}}),
                            telah dilakukan
                            kesepakatan biaya berlangganan permintaan {{$list_order->order_data->tipe}} atas Jaringan Telekomunikasi oleh dan antara :
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PIHAK PERTAMA</b></td>
                    <td style="">:</td>
                    <td><b>PT INDONESIA COMNETS PLUS</b></td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Diwakili Oleh</td>
                    <td style="">:</td>
                    <td>{{$icons->nama_pj}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan</td>
                    <td style="">:</td>
                    <td>{{$icons->jabatan_pj}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alamat Kantor</td>
                    <td style="">:</td>
                    <td>{{$icons->alamat}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nomor Telepon & Faksimile
                    </td>
                    <td style="">:</td>
                    <td>Telp {{$icons->no_telp}}, Fax {{$icons->no_fax}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PIHAK KEDUA</b></td>
                    <td style="">:</td>
                    <td><b>{{$fb->nama_customer}}</b></td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Diwakili Oleh</td>
                    <td style="">:</td>
                    <td>{{$list_order->order_data->nama_pj}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan</td>
                    <td style="">:</td>
                    <td>{{$list_order->order_data->jabatan_pj}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alamat Kantor</td>
                    <td style="">:</td>
                    <td style="text-transform: capitalize;">{{$fb->alamat_kantor}}, {{ ucfirst(strtolower($fb->desa)) }},
                        {{ ucfirst(strtolower($fb->kecamatan)) }}, {{ ucfirst(strtolower($fb->kota)) }},
                        {{ ucfirst(strtolower($fb->provinsi)) }}&nbsp;{{$fb->kode_pos}}</td>
                        <td style="padding-left:-1050px"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nomor Telepon & Faksimile
                    </td>
                    <td style="">:</td>
                    <td>({{$fb->code_telp}}) {{$fb->no_telp}} & ({{$fb->code_fax}}) {{$fb->no_fax}}</td>
                    <td style="padding-left:-1050px"></td>
                </tr>
            </table>
            <div style="font-size: 8pt;margin-left:20px; margin-top: 10px;margin-bottom: 10px">Bahwa PIHAK KEDUA sepakat
                untuk menggunakan layanan dari PIHAK PERTAMA, sesuai dengan ketentuan di bawah ini:
            </div>
            @if($count2 >= 1)
            <table border="1" style="page-break-inside: avoid;border-collapse: collapse; font-size: 7pt; width: 95%; margin-left:20px">
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
                @foreach($exist as $o)
                <?php $no++ ?>
                <tr>
                    <td style="height: 20px;">&nbsp;{{ $no }}</td>
                    <td>&nbsp;{{$o->originating}}</td>
                    <td>&nbsp;{{$o->terminating}}</td>
                    <td>&nbsp;{{$o->nama_layanan}}</td>
                    <td>&nbsp;{{$o->kapasitas}}</td>
                    
                    <td>
                        <?php                                     
                            if($o->biaya_langganan == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($o->biaya_langganan);
                        ?>
                    </td>
                    <td>
                        <?php
                                                    
                            if($o->biaya_instalasi == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($o->biaya_instalasi);
                        ?>
                    </td>
                    <td>&nbsp;Fiber Optic/<br>&nbsp;Ethernet</td>
                    <?php $total_langganan += $o->biaya_langganan ?>
                    <?php $total_instalasi += $o->biaya_instalasi ?>
                </tr>
                @endforeach
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Total Biaya Berlangganan/Bulan : </b></td>
                    <td>&nbsp;</td>
                    <th>

                        <?php                                     
                            if($total_langganan == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($total_langganan);
                        ?>
                    </th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Total Biaya Instalasi : </b></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <th>                
                        <?php                                     
                            if($total_instalasi == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($total_instalasi);
                        ?>
                    </th>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="8" style="padding-left: 10pt"><b>LAYANAN BARU</b></td>
                </tr>
                <?php $total_langganan1=0 ?>
                <?php $total_instalasi1=0 ?>
                <?php $no1=0 ?>
                @foreach($new as $o)
                <?php $no1++ ?>
                <tr>
                    <td style="height: 20px;">{{ $no1 }}</td>
                    <td>{{$o->originating}}</td>
                    <td>{{$o->terminating}}</td>
                    <td>{{$o->nama_layanan}}</td>
                    <td>{{$o->kapasitas}}</td>
                    <td>
                        <?php                                     
                            if($o->biaya_langganan == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($o->biaya_langganan);
                        ?>
                    </td>
                    <td>
                        <?php
                                                    
                            if($o->biaya_instalasi == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($o->biaya_instalasi);
                        ?>
                    </td>
                    <td>Fiber Optic/<br>Ethernet</td>
                    <?php $total_langganan1 += $o->biaya_langganan ?>
                    <?php $total_instalasi1 += $o->biaya_instalasi ?>
                </tr>
                @endforeach
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Total Biaya Berlangganan/Bulan : </b></td>
                    <td>&nbsp;</td>
                    <th>

                        <?php                                     
                            if($total_langganan1 == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($total_langganan1);
                        ?>
                    </th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Total Biaya Instalasi : </b></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <th>

                        <?php                                     
                            if($total_instalasi1 == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($total_instalasi1);
                        ?>
                    </th>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Jangka Waktu Berlangganan : </b></td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align: center;"><b>{{$list_order->order_data->jangka_berlangganan}} (<?php echo terbilang($list_order->order_data->jangka_berlangganan); ?>) Bulan</b></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Tanggal Mulai Penagihan </b></td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align: center;"><b> 
                        <?php
                        if($list_order->order_data->tanggal_penagihan != "" ){
                            echo Date::parse($list_order->order_data->tanggal_penagihan)->format('d-m-Y');
                            echo'<br>';
                        }
                        ?>
                        {{$list_order->order_data->catatan_penagihan}} </b>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Nomor Rekening </b></td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align: center;">
                        <b>Virtual Account : {{$fb->virtual_account}}</b><br>
                        <div style="text-align: center;">
                            <b>
                                BANK MANDIRI KCP PLN KANTOR PUSAT, Jakarta
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Alamat Penagihan </b></td>
                    <td>&nbsp;</td>
                    <th colspan="3">{{$fb->alamat_kantor}}, {{ ucfirst(strtolower($fb->desa)) }},
                        {{ ucfirst(strtolower($fb->kecamatan)) }}, {{ ucfirst(strtolower($fb->kota)) }},
                        {{ ucfirst(strtolower($fb->provinsi)) }}&nbsp;{{$fb->kode_pos}}</th>
                </tr>

            </table>
            @elseif($count2 == 0)
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
                <?php $total_langganan=0 ?>
                <?php $total_instalasi=0 ?>
                <?php $no=0 ?>
                @foreach($list_order->order_layanan as $o)
                    <?php $no++ ?>
                    <tr>
                        <td style="height: 20px;">&nbsp;{{ $no }}</td>
                        <td>&nbsp;{{$o->originating}}</td>
                        <td>&nbsp;{{$o->terminating}}</td>
                        <td>&nbsp;{{$o->nama_layanan}}</td>
                        <td>&nbsp;{{$o->kapasitas}}</td>
                        <td>
                            <?php                                     
                                if($o->biaya_langganan == "0" ){
                                    echo'&nbsp;-';
                                }
                                else
                                    echo '&nbsp;'.rupiah($o->biaya_langganan);
                            ?>
                        </td>
                        <td>
                            <?php
                                                        
                                if($o->biaya_instalasi == "0" ){
                                    echo'&nbsp;-';
                                }
                                else
                                    echo '&nbsp;'.rupiah($o->biaya_instalasi);
                            ?>
                        </td>
                        <td>&nbsp;Fiber Optic/<br>&nbsp;Ethernet</td>
                        <?php $total_langganan += $o->biaya_langganan ?>
                        <?php $total_instalasi += $o->biaya_instalasi ?>
                    </tr>
                @endforeach
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Total Biaya Berlangganan/Bulan : </b></td>
                    <td>&nbsp;</td>
                    <th>

                        <?php                                     
                            if($total_langganan == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($total_langganan);
                        ?>
                    </th>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Total Biaya Instalasi : </b></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <th>

                        <?php                                     
                            if($total_instalasi == "0" ){
                                echo'&nbsp;-';
                            }
                            else
                                echo '&nbsp;'.rupiah($total_instalasi);
                        ?>
                    </th>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Jangka Waktu Berlangganan : </b></td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align: center;"><b>{{$list_order->order_data->jangka_berlangganan}} (<?php echo terbilang($list_order->order_data->jangka_berlangganan); ?>) Bulan</b></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Tanggal Mulai Penagihan </b></td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align: center;"><b> 
                        <?php
                        if($list_order->order_data->tanggal_penagihan != "" ){
                            echo Date::parse($list_order->order_data->tanggal_penagihan)->format('d-m-Y');
                            echo'<br>';
                        }
                        ?>
                        {{$list_order->order_data->catatan_penagihan}} </b>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Nomor Rekening </b></td>
                    <td>&nbsp;</td>
                    <td colspan="3" style="text-align: center;">
                        <b>Virtual Account : {{$fb->virtual_account}}</b><br>
                        <div style="text-align: center;">
                            <b>
                                BANK MANDIRI KCP PLN KANTOR PUSAT, Jakarta
                            </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3"><b>Alamat Penagihan </b></td>
                    <td>&nbsp;</td>
                    <th colspan="3">{{$fb->alamat_kantor}}, {{ ucfirst(strtolower($fb->desa)) }},
                        {{ ucfirst(strtolower($fb->kecamatan)) }}, {{ ucfirst(strtolower($fb->kota)) }},
                        {{ ucfirst(strtolower($fb->provinsi)) }}&nbsp;{{$fb->kode_pos}}</th>
                </tr>
            </table>
            @endif
        </div>
        <!-- #hitung -->
        

        <div class="bottom" style="page-break-inside: avoid;">
            <div style="page-break-inside: auto;font-size: 8pt;margin-top:-30px">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <table style="justify-content: right;" border="0">
                        <tr>
                            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Syarat dan Kondisi:</b><br></td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                            <td>Seluruh biaya {{$list_order->order_data->status_biaya}} termasuk PPN dan pajak-pajak lainnya serta biaya di lokasi gedung
                                (tergantung perijinan lokasi gedung);</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                            <td>Berita Acara Kesepakatan Biaya Berlangganan ini dapat dijadikan sebagai dasar penagihan dan
                                pembayaran Biaya Berlangganan PIHAK PERTAMA kepada PIHAK KEDUA;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;</td>
                            <td>Penagihan Biaya Berlangganan dilakukan per bulan dan ditagihkan di {{$list_order->order_data->status_tagihan}} pemakaian layanan
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
                </p>
            </div>
            <table style="font-size: 8pt;width: 95%; margin-left: 20px; margin-top: 5px;">
                <tr>
                    <td>
                        Demikian Berita Acara Kesepakatan Biaya Berlangganan ini dibuat dalam rangkap 2 (dua), asli dan
                        mempunyai kekuatan hukum yang sama setelah ditandatangani dan merupakan bagian tidak terpisahkan
                        dari
                        Perjanjian antara PIHAK PERTAMA dan PIHAK KEDUA.
                    </td>
                </tr>
            </table>
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
                    <th>( {{$icons->nama_pj}} )</th>
                    <th>&nbsp;</th>
                    <th>( {{$fb->penanggung_jawab}} )</th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
