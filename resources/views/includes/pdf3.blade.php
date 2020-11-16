<div class="contents">

    <div>
        <img src="{{asset('images/a.png')}}" style="float: right; width: 15%;">
    </div>
    <br><br><br><br><br><br><br>
    <!-- tampilan 80% -->
    <div
        style="font-family: Calibri, Helvetica, sans-serif;width: 90% ; margin-right: auto; margin-left: auto; margin-top: -60px ">
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
        <table style="width: 100%; " bgcolor="black">
            <tr>
                <td>
                    <p style="color: white;text-align: center;font-size: 11pt">FORMULIR BERLANGGANAN <br> Jasa
                        Telekomunikasi ICON+</p>
                </td>
            </tr>
        </table>
        <!-- 3 -->
        <div style="font-size:11pt; padding-bottom: 20px; padding-top: 5px">
            <table border="0" style="width: 100%">
                <tr>
                    <td style="width: 30%">NOMOR</td>
                    <td style="width: 1%">:</td>
                    <td colspan="2" style="padding-left: 15px; width: 68%"></td>
                </tr>
                <tr>
                    <td>TANGGAL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px;">{{Date::parse($c->tgl_hari_ini)->format('d F Y')}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <!-- 4 -->
        <table style="width: 100%; " bgcolor="black">
            <tr>
                <td>
                    <p style="color: white;text-align: center; font-size: 11pt">INFORMASI PERUSAHAAN</p>
                </td>
            </tr>
        </table>
        <!-- 5 -->
        <div style="font-size:11pt;padding-bottom: 20px; padding-top: 5px">
            <table border="0" style="width: 100%">
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
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_telp}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>FAX</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_fax}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <!-- 6 -->
        <table style="width: 100%; " bgcolor="black">
            <tr>
                <td>
                    <p style="color: white;text-align: center; font-size: 11pt">PENANGGUNG JAWAB PERUSAHAAN</p>
                </td>
            </tr>
        </table>
        <!-- 7 -->
        <div style="font-size:11pt;padding-bottom: 20px; padding-top: 5px">
            <table border="0" style="width: 100%">
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
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jabatan_penanggung_jawab}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>TELP / HP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_hp}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>KARTU IDENTITAS</td>
                    <td>:</td>
                    <td colspan="2" style="padding-left: 15px">KTP</td>
                </tr>
                <tr>
                    <td>NO KARTU IDENTITAS</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_ktp_penanggung_jawab}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>ALAMAT EMAIL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->Email_penanggung_jawab}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <!-- 8 -->
        <table style="width: 100%;page-break-before:  always;" bgcolor="black">
            <tr>
                <td>
                    <p style="color: white;text-align: center;font-size: 11pt;">PENANGGUNG JAWAB KEUANGAN</p>
                </td>
            </tr>
        </table>
        <!-- 9 -->
        <div style="font-size:11pt;padding-bottom: 20px; padding-top: 5px">
            <table border="0" style="width: 100%">
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
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jabatan_keuangan}}</td>
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
                    <td>NO HP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_hp_keuangan}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->email_keuangan}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <!-- 10 -->
        <table style="width: 100%; " bgcolor="black">
            <tr>
                <td>
                    <p style="color: white;text-align: center; font-size: 11pt">PENANGGUNG JAWAB TEKNIS</p>
                </td>
            </tr>
        </table>
        <!-- 11 -->
        <div style="font-size:11pt;padding-bottom: 20px; padding-top: 5px">
            <table border="0" style="width: 100%">
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
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->jabatan_teknis}}</td>
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
                    <td>NO HP</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->no_hp_teknis}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    @foreach($customer as $c)
                    <td colspan="2" style="padding-left: 15px; width: 68%">{{$c->email_teknis}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <!-- 12 -->
        <div style="font-size:11pt;padding-bottom: 20px; padding-top: 5px; ">
            Dengan ini kami menyatakan bahwa data-data dan informasi yang kami berikan di atas adalah benar adanya. Kami
            telah memahami ketentuan dan syarat-syarat berlangganan Jasa Telekomunikasi berikut lampiran-lampirannya
            yang
            merupakan satu kesatuan yang tak terpisah dengan Formulir Berlangganan ini. Dengan menandatangani Formulir
            Berlangganan ini maka dengan ini pula kami menyatakan menerima dan menyetujui pemberlakukan Ketentuan
            Berlangganan Jasa Telekomunikasi dimaksud terhadap kepelangganan ini tanpa kecuali.
        </div>
        <!-- 13 -->
        <table style="width: 100%; border-collapse: collapse;font-size:10pt " border="1">
            <tr>
                <td style="padding-left: 10pt">Di isi oleh ICON+</td>
            </tr>
            <tr>
                <td style="padding-left: 10pt; padding-bottom: 15pt; padding-top: 15pt ">Tanda Tangan / Signature :</td>
            </tr>
            <tr>
                @foreach($customer as $c)
                <td style="padding-left: 10pt">Manager Penjualan dan Pemasaran : Wahyu Toni Hermawan
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Tanggal :{{Date::parse($c->tgl_hari_ini)->format('d F Y')}}</td>
                @endforeach
            </tr>
            <tr>
                <td style="padding-left: 10pt">Kelengkapan Dokumen<br>
                    <table>
                        <tr>
                            <td style="padding-right: 10pt">
                                <div style="width: 40px; height: 20px; border: 1px solid green;"></div>
                            </td>
                            <td style="padding-left: 25pt">KTP / Passport ID</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 10pt">
                                <div style="width: 40px; height: 20px; border: 1px solid green;"></div>
                            </td>
                            <td style="padding-left: 25pt">NPWP</td>
                        </tr>
                        <tr>
                            <td style="padding-right: 10pt">
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
        <!-- 14 -->
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
                <td style="text-align: center;"><u>(Agus Widya Santoso)</u></td>
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
        </table>


    </div>
    <!-- end of tampilan 80% -->

</div>
