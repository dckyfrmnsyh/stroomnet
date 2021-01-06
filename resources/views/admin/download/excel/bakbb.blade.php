<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>No. Pihak Pertama</th>
            <th>No. Pihak Kedua</th>
            <th>Tanggal Kesepakatan</th>
            <th>Tipe</th>
            <th>Nama Penanggung Jawab</th>
            <th>Jabatan Penanggung Jawab</th>
            <th>Status Biaya</th>
            <th>Status Penagihan</th>
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
            <th>Status Publish</th>
            <th>Created By</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($bakbb as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->nomor }}</td>
            <td>{{ $item->no_pihak_pertama }}</td>
            <td>{{ $item->no_pihak_kedua }}</td>
            <td>{{ $item->tanggal_kesepakatan }}</td>
            <td>{{ $item->tipe }}</td>
            <td>{{ $item->nama_pj }}</td>
            <td>{{ $item->jabatan_pj }}</td>
            <td>{{ ucfirst($item->status_biaya)  }} Termasuk PPN</td>
            <td>{{ ucfirst($item->status_tagihan) }} Pemakaian Layanan </td>
            <td>{{ $item->tanggal_penagihan }}</td>
            <td>{{ $item->catatan_penagihan }}</td>
            <td>{{ $item->jangka_berlangganan }}</td>
            <td>
                @forelse($layanan1[$item->list_id] as $data)
                    {{ $data->originating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->list_id] as $data)
                    {{ $data->terminating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->list_id] as $data)
                    {{ $data->nama_layanan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->list_id] as $data)
                    {{ $data->kapasitas }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->list_id] as $data)
                    {{ $data->biaya_langganan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->list_id] as $data)
                    {{ $data->biaya_instalasi }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->list_id] as $data)
                    {{ $data->originating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->list_id] as $data)
                    {{ $data->terminating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->list_id] as $data)
                    {{ $data->nama_layanan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->list_id] as $data)
                    {{ $data->kapasitas }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->list_id] as $data)
                    {{ $data->biaya_langganan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->list_id] as $data)
                    {{ $data->biaya_instalasi }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>{{ ucfirst($item->status_publish) }}</td>
            <td>{{$nama_user[$item->list_id]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>