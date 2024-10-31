<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnggotaRumahTangga;
use App\Models\KepalaRumah;
use App\Models\PenerimaPKH;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $menu;
    public function __construct($menu = 'dashboard')
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $menu = $this->menu;
      
        return view('pages.admin.index', compact('menu'));
    }

    public function statistik()
    {
        // Menghitung jumlah penerima PKH berdasarkan status
        $menu = 'dashboard';

        // Menyiapkan data untuk chart

        return view('pages.user.statistik', compact('menu', 'chartData'));
    }


    public function rekap()
    {
        $menu = 'rekap';
        return view('pages.admin.rekap.index', compact('menu'));
    }

    public function cetak_rekap()
    {
        // Ambil semua data penerima PKH yang telah diverifikasi (status 'S')
        // $data = PenerimaPKH::with(['asetGet', 'kepalaRumahGet', 'anggotaRumahTanggaGet', 'ketAsetGet', 'ketPerumahanGet'])
        //     ->where('status', 'S')
        //     ->get();


        // Load the view with the data
        $pdf = Pdf::loadView('pages.admin.rekap.cetak', compact('data'))
            ->setPaper('a3', 'landscape');;

        // Download the PDF
        return $pdf->download('data-rekapan-PKH.pdf');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
