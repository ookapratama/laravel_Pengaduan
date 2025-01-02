<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluhan_222406;
use App\Models\Tanggapan_222406;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    private $menu;
    public function __construct($menu = 'cetak')
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = $this->menu;
        $data  = Tanggapan_222406::all();
        return view('pages.admin.cetak.index', compact('menu', 'data'));
    }

    public function laporan(Request $request) {

        // Ambil data berdasarkan rentang tanggal
        $data = Tanggapan_222406::whereBetween('created_at', [
            explode(" ", $request->dari),
            explode(" ",$request->sampai)
        ])->get();
        
        $date = array(
            'dari' => explode(" ", $request->dari),
            'sampai' => explode(" ",$request->sampai)
        );
        // Generate PDF
        $pdf = Pdf::loadView('pages.admin.cetak.laporan', compact('data', 'date'));

        // Unduh file PDF
        return $pdf->download('laporan_pengaduan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

    
}
