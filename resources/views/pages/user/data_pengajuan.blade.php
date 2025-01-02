@foreach ($keluhan as $index => $k)
    <tr>
        {{-- {{ dd($tanggapan) }} --}}
        <td class="text-center">{{ $index + 1 }}</td>
        <td>{{ $pelanggan->nama_222406 }}</td>
        <td>{{ $k->keluhan_222406 }}</td>
        <td>{{ $k->nama_kategori_222406 }}</td>
        <td>
            @foreach ($tanggapan[$index] as $t)
                {{ $t->tanggapan_222406 }} <br>
            @endforeach
        </td>
        <td>
            @if ($k->status_keluhan_222406 == 'Diproses')
                <div class="badge badge-primary">
                    {{ $k->status_keluhan_222406 }}
                </div>
            @elseif ($k->status_keluhan_222406 == 'Pending')
                <div class="badge badge-warning">
                    {{ $k->status_keluhan_222406 }}
                </div>
            @else
                <div class="badge badge-success">
                    {{ $k->status_keluhan_222406 }}
                </div>
            @endif
        </td>
    </tr>
@endforeach
