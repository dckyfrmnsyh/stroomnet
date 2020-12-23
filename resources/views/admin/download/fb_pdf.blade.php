<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-eqiuv="X-UA-Compatible" content="ie=edge">
    <title>Form Berlangganan</title>
    <style>
        .breakNow {
                page-break-inside: avoid;
                page-break-after: always;
                margin-top: 50px;

            }
    </style>
</head>
<body style="font-family: Calibri; background-color: white;">
     
<div class="contents">

    
    <br><br><br><br>
    <!-- tampilan page 1 80% -->
    <div
        style="font-family: Calibri, Helvetica, sans-serif;width: 90% ; margin-right: auto; margin-left: auto; margin-top: -60px; border : 1px solid">
        <div align="center" style="margin-top: 5%">
            <img src="{{asset('images/a.png')}}" style=" width: 15%;">
        </div> 
        <!-- 1 -->
        <div>
            <center>
                <b style="font-size: 14pt">PT. INDONESIA COMNETS PLUS</b><br>
                <p style="font-size: 11pt">
                    Jl. Ketintang Baru 1 No. 1-3 Surabaya 60231<br>
                    Telp : (031) 827 3399 / 827 0033, Fax. (031) 828 6611</p>
            </center>
        </div>
        <!-- 2 -->
        <table style="width: 100%;" border="0">
            <tr>
                <th colspan="4" style="background-color: black">
                    <p style="color: white;text-align: center;font-size: 11pt">FORMULIR BERLANGGANAN <br> Jasa
                        Telekomunikasi ICON+</p>
                </th>
            </tr>
            <tr >
                <td style="width: 30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOMOR</td>
                <td style="width: 1%">&nbsp;&nbsp;:</td>
                @foreach($customer as $c)
                <td colspan="2" style="padding-left: 15px;">{{$c->nomor_fb}}</td>
                @endforeach
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TANGGAL</td>
                <td>&nbsp;&nbsp;:</td>
                @foreach($customer as $c)
                <td colspan="2" style="padding-left: 15px;">{{Date::parse($c->tgl_billing)->format('d F Y')}}</td>
                @endforeach
            </tr>
            <tr>
                <td colspan="4">&nbsp;<br></td>
            </tr>
        </table>
            <!--  -->

                <table style="width: 93%; margin-left: auto; ; margin-right: auto; border-bottom: 1px dashed; border-right: 1px dashed;  border-left: 1px dashed ; " >
                    <tr>
                        <th style="background-color: black " colspan="4" >
                        <p style="color: white;text-align: center; font-size: 11pt">INFORMASI PERUSAHAAN</p>
                        </th>    
                    </tr>
                    <tr>
                        <td style="width: 30% ">NAMA INSTANSI</td>
                        <td style="width: 1%">:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->nama_customer}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>GRUP PERUSAHAAN</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->grup}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>NAMA BRAND</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->nama_brand}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>JENIS USAHA / SEGMEN</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jenis_usaha}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>ALAMAT</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%;">{{$c->alamat_kantor}},
                            {{ucfirst(strtolower($c->desa))}}, </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        @foreach($customer as $c)
                        <td style="padding-left: 15px;">{{ucfirst(strtolower($c->kecamatan))}},
                            {{ucfirst(strtolower($c->kota))}}, <br> {{ucfirst(strtolower($c->provinsi))}}</td>
                        <td style="float: right;"><br> KODEPOS : {{$c->kode_pos}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>ALAMAT EMAIL</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->email_perusahaan}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>NO NPWP</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->npwp_perusahaan}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>TELEPON</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_telp}}) {{$c->no_telp}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>FAX</td>
                        <td>:</td>
                        @foreach($customer as $c)
                        <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_fax}}) {{$c->no_fax}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                </table> 
                <table>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
        
    </div>
   <div class="breakNow"></div>
    <!-- page 2 -->
    <div
        style="font-family: Calibri, Helvetica, sans-serif;width: 90% ; margin-right: auto; margin-left: auto; margin-top: 60px; border : 1px solid">
        <table style="width: 100%; " bgcolor="" border="0">
            <tr>
                <th colspan="4" style="background-color: black">
                    <p style="color: white;text-align: center;font-size: 11pt">FORMULIR BERLANGGANAN <br> Jasa
                        Telekomunikasi ICON+</p>
                </th>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
            <!--  -->
            <table style="width: 93%; margin-left: auto; ; margin-right: auto;border-bottom: 1px dashed; border-right: 1px dashed;  border-left: 1px dashed " border="0" >

                <tr>
                    <th style="background-color: black" colspan="4">
                        <p style="color: white;text-align: center; font-size: 11pt">PENANGGUNG JAWAB PERUSAHAAN</p>
                    </th>
                </tr>

                <tr>
                    <td style="width: 30% ">NAMA</td>
                    <td style="width: 1%">:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->penanggung_jawab}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>TEMPAT, TGL LAHIR</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">
                        {{$c->tempat_lahir}},{{Date::parse($c->tgl_lahir)->format('d F Y')}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>JABATAN</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jabatan_pj}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>TELP / HP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_telp_pj}}) {{$c->no_telp_pj}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>FAX</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_fax_pj}}) {{$c->no_fax_pj}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>KARTU IDENTITAS</td>
                    <td>:</td>
                    <td colspan="2" style="padding-left: 15px">{{$c->id_card_pj}}</td>
                </tr>
                <tr>
                    <td>NO KARTU IDENTITAS</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_id_card_pj}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>MASA BERLAKU</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{Date::parse($c->valid_until_card_pj)->format('d F Y')}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>ALAMAT EMAIL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->email_pj}}</td>
                    @endforeach
                </tr>
                 <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <!--  -->
                <tr>
                    <th style="background-color: black" colspan="4">
                        <p style="color: white;text-align: center;font-size: 11pt;">PENANGGUNG JAWAB KEUANGAN</p>
                    </th>
                </tr>
                <tr>
                    <td style="width: 30% ">NAMA</td>
                    <td style="width: 1%">:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->nama_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>DEPARTMENT</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->bagian_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>JABATAN</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jabatan_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>NO HP / TELP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_telp_keuangan}}) {{$c->no_telp_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>FAX</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_fax_keuangan}}) {{$c->no_fax_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->email_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <!--  -->
                <tr>
                    <th style="background-color: black" colspan="4">
                        <p style="color: white;text-align: center; font-size: 11pt">PENANGGUNG JAWAB TEKNIS</p>
                    </th>
                </tr>
                <tr>
                    <td style="width: 30% ">NAMA</td>
                    <td style="width: 1%">:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->nama_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>DEPARTMENT</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->bagian_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>JABATAN</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jabatan_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>TELP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_telp_teknis}}) {{$c->no_telp_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>NO HP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_hp_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>FAX</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">({{$c->code_fax_teknis}}) {{$c->no_fax_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->email_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>        
            </table>
            

        
    </div>
        <!-- page 3 -->
    <div class="breakNow"></div>
    <div
        style="font-family: Calibri, Helvetica, sans-serif;width: 90% ; margin-right: auto; margin-left: auto; margin-top: 60px; border : 1px solid">
         <table style="width: 100%; " bgcolor="" border="0">
            <tr>
                <th colspan="3" style="background-color: black">
                    <p style="color: white;text-align: center;font-size: 11pt">FORMULIR BERLANGGANAN <br> Jasa
                        Telekomunikasi ICON+</p>
                </th>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
            <table style="width: 93%; margin-left: auto; ; margin-right: auto;" border="0" >
                <tr>
                    <td style="font-size:11pt;padding-bottom: 20px; padding-top: 5px; text-align: justify;">
                        Dengan ini kami menyatakan bahwa data-data dan informasi yang kami berikan di atas adalah benar adanya. Kami telah memahami ketentuan dan syarat-syarat berlangganan Jasa Telekomunikasi berikut lampiran-lampirannya yang merupakan satu kesatuan yang tak terpisah dengan Formulir Berlangganan ini. Dengan menandatangani Formulir Berlangganan ini maka dengan ini pula kami menyatakan menerima dan menyetujui pemberlakukan Ketentuan Berlangganan Jasa Telekomunikasi dimaksud terhadap kepelangganan ini tanpa kecuali.
                    </td>
                </tr>

            </table>

            <table style="width: 93%; border-collapse: collapse;font-size:10pt;margin-left: auto; ; margin-right: auto; border: 1pt dashed; " border="0">
                <tr>
                    <td style="padding-left: 10pt; border-bottom: 1pt dashed">Di isi oleh ICON+</td>
                </tr>
                <tr>
                    <td style="padding-left: 10pt; padding-bottom: 15pt; padding-top: 15pt;border-bottom: 1pt dashed ">Tanda Tangan / Signature :</td>
                </tr>
                <tr>
                    @foreach($customer as $c)
                    <td style="padding-left: 10pt; border-bottom: 1pt dashed">Manager Penjualan dan Pemasaran : Wahyu Toni Hermawan
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Tanggal :{{Date::parse($c->tgl_billing)->format('d F Y')}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td style="padding-left: 10pt">Kelengkapan Dokumen<br>
                        <table>
                            <tr>
                                <td style="padding-right: 10pt; padding-bottom: 5px">
                                    <div style="width: 40px; height: 20px; border: 1px solid green;"></div>
                                </td>
                                <td style="padding-left: 25pt">KTP / Passport ID</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10pt;padding-bottom: 5px">
                                    <div style="width: 40px; height: 20px; border: 1px solid green;"></div>
                                </td>
                                <td style="padding-left: 25pt">NPWP</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10pt;padding-bottom: 5px">
                                    <div style="width: 40px; height: 20px; border: 1px solid green;"></div>
                                </td>
                                <td style="padding-left: 25pt">Lainya ...................................</td>
                            </tr>
                        </table>
                        <br>
                    </td>
                </tr>
            </table>
        <br>
        <!--  -->
        <table style="width: 100%; font-size: 11pt" border="0">
            <tr style="">
                <th style="width: 45%;text-align: center;">PIHAK PERTAMA</th>
                <th style="width: 10%">&nbsp;</th>
                <th style="width: 45%; text-align: center;">PIHAK KEDUA</th>
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
                <td style="text-align: center;"><u>( {{$icons->nama_pj}} )</u></td>
                <td>&nbsp;</td>
                @foreach($customer as $c)
                <td style="text-align: center;"><u>({{$c->penanggung_jawab}})</u></td>
                @endforeach
            </tr>
            <tr>
                <td style="text-align: center;">Plt. GM SBU Regional JBT</td>
                <td>&nbsp;</td>
                @foreach($customer as $c)
                <td style="text-align: center;">{{$c->jabatan_penanggung_jawab}}</td>
                @endforeach
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>


        
    </div>

    
    <!-- end of tampilan page 1 80% -->

</div>

    
    
    
</body>
</html>