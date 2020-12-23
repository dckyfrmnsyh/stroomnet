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
            <td>{{ $item->order_data->nomor }}</td>
            <td>{{ $item->order_data->no_pihak_pertama }}</td>
            <td>{{ $item->order_data->no_pihak_kedua }}</td>
            <td>{{ $item->order_data->tanggal_kesepakatan }}</td>
            <td>{{ $item->order_data->tipe }}</td>
            <td>{{ $item->order_data->nama_pj }}</td>
            <td>{{ $item->order_data->jabatan_pj }}</td>
            <td>{{ ucfirst($item->order_data->status_biaya)  }} Termasuk PPN</td>
            <td>{{ ucfirst($item->order_data->status_tagihan) }} Pemakaian Layanan </td>
            <td>{{ $item->order_data->tanggal_penagihan }}</td>
            <td>{{ $item->order_data->catatan_penagihan }}</td>
            <td>{{ $item->order_data->jangka_berlangganan }}</td>
            <td>
                @forelse($layanan1[$item->id] as $data)
                    {{ $data->originating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->id] as $data)
                    {{ $data->terminating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->id] as $data)
                    {{ $data->nama_layanan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->id] as $data)
                    {{ $data->kapasitas }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->id] as $data)
                    {{ $data->biaya_langganan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan1[$item->id] as $data)
                    {{ $data->biaya_instalasi }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->id] as $data)
                    {{ $data->originating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->id] as $data)
                    {{ $data->terminating }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->id] as $data)
                    {{ $data->nama_layanan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->id] as $data)
                    {{ $data->kapasitas }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->id] as $data)
                    {{ $data->biaya_langganan }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>
                @forelse($layanan2[$item->id] as $data)
                    {{ $data->biaya_instalasi }}, 
                @empty 
                    <p></p>
                @endforelse
            </td>
            <td>{{$nama_user[$item->id]}}</td>
            <td>{{ ucfirst($item->order_data->status_publish) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>