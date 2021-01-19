<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>Tanggal</th>
            <th>Virtual Account</th>
            <th>Nama Instansi</th>
            <th>Grup</th>
            <th>Nama Brand</th>
            <th>Jenis Usaha</th>
            <th>Alamat Kantor</th>
            <th>Kode Pos</th>
            <th>Alamat Web</th>
            <th>Email Perusahaan</th>
            <th>NPWP Perusahaan</th>
            <th>Faximile</th>
            <th>Telephone</th>
            <th>Penanggung Jawab </th>
            <th>Tempat, Tanggal Lahir </th>
            <th>Jabatan Penanggung Jawab</th>
            <th>Faximile Penanggung Jawab</th>
            <th>Telephone Penanggung Jawab</th>
            <th>ID Card Penanggung Jawab</th>
            <th>Nomor ID Card Penanggung Jawab</th>
            <th>Masa Berlaku ID Card Penanggung Jawab</th>
            <th>Email Penanggung Jawab</th>
            <th>Nama Keuangan </th>
            <th>Bagian Keuangan </th>
            <th>Jabatan Keuangan</th>
            <th>Faximile Keuangan</th>
            <th>Telephone Keuangan</th>
            <th>Email Keuangan</th>
            <th>Nama Teknis </th>
            <th>Bagian Teknis </th>
            <th>Jabatan Teknis</th>
            <th>Faximile Teknis</th>
            <th>Nomor Handphone Teknis</th>
            <th>Telephone Teknis</th>
            <th>Email Teknis</th>
            <th>Created By</th>
            <th>Sales</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($fb as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nomor_fb }}</td>
            <td>{{ $data->tgl_billing }}</td>
            <td>{{ $data->virtual_account }}</td>
            <td>{{ $data->nama_customer }}</td>
            <td>{{ $data->grup }}</td>
            <td>{{ $data->nama_brand }}</td>
            <td>{{ $data->jenis_usaha }}</td>
            <td>{{$data->alamat_kantor}}, 
             {{ucfirst(strtolower($data->desa))}}, 
             {{ucfirst(strtolower($data->kecamatan))}}, 
             {{ucfirst(strtolower($data->kota))}}, 
             {{ucfirst(strtolower($data->provinsi))}}
            </td>
            <td>{{ $data->kode_pos }}</td>
            <td>{{ $data->alamat_situs }}</td>
            <td>{{ $data->email_perusahaan }}</td>
            <td>{{ $data->npwp_perusahaan }}</td>
            <td>({{ $data->code_fax }}) {{ $data->no_fax }}</td>
            <td>({{ $data->code_telp }}) {{ $data->no_telp }}</td>
            <td>{{ $data->penanggung_jawab }}</td>
            <td>{{ $data->tempat_lahir }}, {{$data->tgl_lahir}}</td>
            <td>{{ $data->jabatan_pj }}</td>
            <td>({{ $data->code_fax_pj }}) {{ $data->no_fax_pj }}</td>
            <td>({{ $data->code_telp_pj }}) {{ $data->no_telp_pj }}</td>
            <td>{{ $data->id_card_pj }}</td>
            <td>{{ $data->no_id_card_pj }}</td>
            <td>{{ $data->valid_until_card_pj }}</td>
            <td>{{ $data->email_pj }}</td>
            <td>{{ $data->nama_keuangan }}</td>
            <td>{{ $data->bagian_keuangan }}</td>
            <td>{{ $data->jabatan_keuangan }}</td>
            <td>({{ $data->code_fax_keuangan }}) {{ $data->no_fax_keuangan }}</td>
            <td>({{ $data->code_telp_keuangan }}) {{ $data->no_telp_keuangan }}</td>
            <td>{{ $data->email_keuangan }}</td>
            <td>{{ $data->nama_teknis }}</td>
            <td>{{ $data->bagian_teknis }}</td>
            <td>{{ $data->jabatan_teknis }}</td>
            <td>({{ $data->code_fax_teknis }}) {{ $data->no_fax_teknis }}</td>
            <td>{{ $data->no_hp_teknis }}</td>
            <td>({{ $data->code_telp_teknis }}) {{ $data->no_telp_teknis }}</td>
            <td>{{ $data->email_teknis }}</td>
            <td>{{$nama_user[$data->id]}}</td>
            <td>
                    {{$nama_sales[$data->id] ?? 'Sales Belum Disesuaikan Mohon Sesuaikan Sales dengan melakukan edit Data FB'}}
            </td>
            <td>{{$data->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>