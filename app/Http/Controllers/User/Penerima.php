<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AnggotaRumahTangga;
use App\Models\KategoriKeluhan_222406;
use App\Models\Keluhan_222406;
use App\Models\KepalaRumah;
use App\Models\KetAset;
use App\Models\KetPerumahan;
use App\Models\Pelanggan_222406;
use App\Models\PenerimaPKH;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Penerima extends Controller
{
    private $menu;
    public function __construct($menu = 'permintaan')
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = $this->menu;
        $kategori = KategoriKeluhan_222406::all();
        return view('pages.user.permintaan', compact('menu', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r = $request->all();

        // 
        // $file = $request->file('foto');

        // $ext = $file->getClientOriginalExtension();

        // $nameFoto = date('Y-m-d_H-i-s_') . "." . $ext;
        // $destinationPath = public_path('upload/rumah');
        // $file->move($destinationPath, $nameFoto);
        // $fileUrl = asset('upload/rumah/' . $nameFoto);
        // $r['foto'] = $nameFoto;
        // $r['id_pelanggan_222406'] = 1;
        $r['tgl_terdaftar_222406'] = Carbon::now();
        Pelanggan_222406::create($r);
        $getPelanggan = Pelanggan_222406::latest()->first();
        // dd($getPelanggan);

        $r['id_pelanggan_222406'] = $getPelanggan->id;
        $r['tgl_keluhan_222406'] = Carbon::now();
        $r['status_keluhan_222406'] = 'Diproses';


        // dd($r);
        Keluhan_222406::create($r);



        return redirect()->route('permintaan.index')->with('message', 'store permintaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $r)
    {
        $r = $r->all();
        $r['email'] = $r['email']  ?? '';
        $pelanggan = DB::table('pelanggan_222406s')->where('email_222406', $r['email'])->first();

        if ($pelanggan) {
            // Query keluhan berdasarkan id pelanggan
            $keluhan = DB::table('keluhan_222406s')
                ->join('kategori_keluhan_222406s', 'keluhan_222406s.id_kategori_222406', '=', 'kategori_keluhan_222406s.id')
                ->where('keluhan_222406s.id_pelanggan_222406', $pelanggan->id)
                ->select('keluhan_222406s.*', 'kategori_keluhan_222406s.nama_kategori_222406') // Menambahkan nama_kategori dari tabel kategori
                ->get();

            // Query tanggapan berdasarkan id keluhan
            $tanggapan = [];
            foreach ($keluhan as $k) {
                $tanggapan[] = DB::table('tanggapan_222406s')->where('id_keluhan_222406', $k->id)->get();
            }
            // Mempersiapkan data untuk view HTML
            $html = view('pages.user.data_pengajuan', compact('pelanggan', 'keluhan', 'tanggapan'))->render();

            return response()->json(['html' => $html]);
        } else {
            return response()->json(['html' => '<p>No data found</p>']);
        }

        // if ($getkrt) {
        //     $getPenerima = PenerimaPKH::where('kepala_id', $getkrt->id)->first();
        //     $getAset = KetAset::where('kepala_id', $getkrt->id)->first();
        //     $getRumah = KetPerumahan::where('kepala_id', $getkrt->id)->first();
        //     $art = AnggotaRumahTangga::where('kepala_id', $getkrt->id)->get();

        //     $datas = collect([
        //         (object) [
        //             'krt' => $getkrt,
        //             'penerima' => $getPenerima,
        //             'status' => $getAset ? 'S' : 'P'
        //         ]
        //     ]);
        //     // dd($datas);
        //     return response()->json([
        //         'html' => view('pages.user.table_cek', ['datas' => $datas])->render()
        //     ]);
        // } else {
        //     return response()->json([
        //         'html' => '<p>Data tidak ditemukan</p>'
        //     ]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
