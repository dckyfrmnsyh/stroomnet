<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>No. Pihak Pertama</th>
            <th>No. Pihak Kedua</th>
            <th>Tanggal Kesepakatan</th>
            <th>Tipe</th>
            <th>Tanggal Penagihan</th>
            <th>Catatan Penagihan</th>
            <th>Jangka Waktu Berlangganan</th>
            <th>Originating Lama</th>
            <th>Terminating Lama</th>
            <th>Nama Layanan Lama</th>
            <th>Kapasitas Lama</th>
            <th>Biaya Langganan Lama</th>
            <th>Biaya Instalasi Lama</th>
            <th>Originating Baru</th>
            <th>Terminating Baru</th>
            <th>Nama Layanan Baru</th>
            <th>Kapasitas Baru</th>
            <th>Biaya Langganan Baru</th>
            <th>Biaya Instalasi Baru</th>
            <th>Created By</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($bakbb as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->order_data->nomor }}</td>
            <td>{{ $item->order_data->no_pihak_pertama }}</td>
            <td>{{ $item->order_data->no_pihak_kedua }}</td>
            <td>{{ $item->order_data->tanggal_kesepakatan }}</td>
            <td>{{ $item->order_data->tipe }}</td>
            <td>{{ $item->order_data->tanggal_penagihan }}</td>
            <td>{{ $item->order_data->catatan_penagihan }}</td>
            <td>{{ $item->order_data->jangka_berlangganan }}</td>
            @forelse($layanan1[$item->id] as $data)
            <td>{{ $data->originating }}, </td>
            <td>{{ $data->terminating }}, </td>
            <td>{{ $data->nama_layanan }}, </td>
            <td>{{ $data->kapasitas }}, </td>
            <td>{{ $data->biaya_langganan }}, </td>
            <td>{{ $data->biaya_instalasi }}, </td>
            @empty
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @endforelse
            @forelse($layanan2[$item->id] as $data)
            <td>{{ $data->originating }}, </td>
            <td>{{ $data->terminating }}, </td>
            <td>{{ $data->nama_layanan }}, </td>
            <td>{{ $data->kapasitas }}, </td>
            <td>{{ $data->biaya_langganan }}, </td>
            <td>{{ $data->biaya_instalasi }}, </td>
            @empty
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @endforelse
            <td>{{$nama_user[$item->id]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>