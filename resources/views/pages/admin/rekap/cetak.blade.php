<!DOCTYPE html>
<html>

<head>
    <title>Rekap Data Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 26px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .section {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Rekap Data penerima PKH</h1>

    <!-- Tabel Identitas Kepala Rumah -->
    @foreach ($data as $i => $v)
        <h2>Data Ke {{ ++$i }}</h2>
        <div class="section">
            <h2>Identitas Kepala Rumah</h2>
            <table>
                <tbody>
                    <tr>
                        <th>Nama Kepala Rumah Tangga</th>
                        <td>{{ $v['kepalaRumahGet']->nama }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $v['kepalaRumahGet']->nik }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $v['kepalaRumahGet']->jkl }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $v['kepalaRumahGet']->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>{{ $v['kepalaRumahGet']->pendidikan_terakhir }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $v['kepalaRumahGet']->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Penghasilan Perbulan</th>
                        <td>Rp. {{ $v['kepalaRumahGet']->penghasilan_perbulan }}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td>{{ $v['kepalaRumahGet']->tempat_lahir }}, {{ $v['kepalaRumahGet']->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Riwayat Penyakit</th>
                        <td>{{ $v['kepalaRumahGet']->riwayat_penyakit }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Cacat</th>
                        <td>{{ $v['kepalaRumahGet']->jenis_cacat }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah ART</th>
                        <td>{{ $v['kepalaRumahGet']->jumlah_art }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tabel Anggota Rumah Tangga (ART) -->
        <div class="section">
            <h2>Anggota Rumah Tangga (ART)</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Hubungan</th>
                        <th>Status Kehamilan</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Riwayat Penyakit</th>
                        <th>Jenis Cacat</th>
                        <th>Partisipasi Sekolah</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Ijazah Terakhir</th>
                        <th>Pekerjaan Utama</th>
                        <th>Penghasilan Perbulan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($v['anggotaRumahTanggaGet'] as $index => $art)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $art->nik }}</td>
                            <td>{{ $art->nama }}</td>
                            <td>{{ $art->hubungan }}</td>
                            <td>{{ $art->status_kehamilan ?? '-' }}</td>
                            <td>{{ $art->jkl }}</td>
                            <td>{{ $art->tempat_lahir }}, {{ $art->tgl_lahir }}</td>
                            <td>{{ $art->riwayat_penyakit ?? '-' }}</td>
                            <td>{{ $art->jenis_cacat ?? '-' }}</td>
                            <td>{{ $art->partisipasi_sekolah ?? '-' }}</td>
                            <td>{{ $art->jenjang_pendidikan ?? '-' }}</td>
                            <td>{{ $art->ijazah ?? '-' }}</td>
                            <td>{{ $art->pekerjaan ?? '-' }}</td>
                            <td>{{ $art->penghasilan_perbulan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel Detail Perumahan -->
        <div class="section">
            <h2>Detail Perumahan</h2>
            <table>
                <tbody>
                    <tr>
                        <th>Status Penugasan Bangunan</th>
                        <td>{{ $v['ketPerumahanGet']->status_penugasan }}</td>
                    </tr>
                    <tr>
                        <th>Status Lahan</th>
                        <td>{{ $v['ketPerumahanGet']->status_lahan }}</td>
                    </tr>
                    <tr>
                        <th>Luas Lantai</th>
                        <td>{{ $v['ketPerumahanGet']->luas_lantai }} (m2)</td>
                    </tr>
                    <tr>
                        <th>Jumlah Kamar</th>
                        <td>{{ $v['ketPerumahanGet']->jumlah_kamar }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Lantai</th>
                        <td>{{ $v['ketPerumahanGet']->jenis_lantai }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Atap</th>
                        <td>{{ $v['ketPerumahanGet']->jenis_atap }}</td>
                    </tr>
                    <tr>
                        <th>Cara Memperoleh Air Minum</th>
                        <td>{{ $v['ketPerumahanGet']->peroleh_air }}</td>
                    </tr>
                    <tr>
                        <th>Sumber Penerangan Utama</th>
                        <td>{{ $v['ketPerumahanGet']->sumber_penerangan }}</td>
                    </tr>
                    @if ($v['ketPerumahanGet']->sumber_penerangan == 'Listrik')
                        <tr>
                            <th>Jumlah Watt</th>
                            <td>{{ $v['ketPerumahanGet']->watt_listrik }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Bahan Bakar/Energi untuk Memasak</th>
                        <td>{{ $v['ketPerumahanGet']->bahan_energi }}</td>
                    </tr>
                    <tr>
                        <th>Penggunaan Fasilitas Tempat BAB</th>
                        <td>{{ $v['ketPerumahanGet']->guna_wc }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kloset</th>
                        <td>{{ $v['ketPerumahanGet']->jenis_wc }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Pembuangan Akhir Tinja</th>
                        <td>{{ $v['ketPerumahanGet']->akhir_wc }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tabel Detail Kepemilikan Aset -->
        <div class="section">
            <h2>Detail Kepemilikan Aset</h2>
            <table>
                <tbody>
                    <tr>
                        <th>Lemari Es/Kulkas</th>
                        <td>{{ $v['ketAsetGet']->have_lemari_es }}</td>
                    </tr>
                    <tr>
                        <th>Televisi</th>
                        <td>{{ $v['ketAsetGet']->have_tv }}</td>
                    </tr>
                    <tr>
                        <th>Sepeda</th>
                        <td>{{ $v['ketAsetGet']->have_sepeda }}</td>
                    </tr>
                    <tr>
                        <th>Sepeda Motor</th>
                        <td>{{ $v['ketAsetGet']->have_motor }}</td>
                    </tr>
                    <tr>
                        <th>Luas Lahan</th>
                        <td>{{ $v['ketAsetGet']->luas_lahan }} (m2)</td>
                    </tr>
                    <tr>
                        <th>Kepemilikan Ternak</th>
                        <td>{{ $v['ketAsetGet']->have_ternak }} Sebanyak {{ $v['ketAsetGet']->jumlah_ternak }}</td>
                    </tr>
                    <tr>
                        <th>foto rumah</th>
                        <td>
                            <img src="{{ public_path('upload/rumah/' . $v['ketPerumahanGet']->foto) }}" width="150"
                                alt="Foto Rumah">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
    @endforeach


</body>

</html>
