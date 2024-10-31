<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PenerimaPKH;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $menu;
    public function __construct($menu = 'landing')
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = $this->menu;
        return view('pages.user.index', compact('menu'));
    }


    public function kontak()
    {
        $menu = 'kontak';
        return view('pages.user.kontak', compact('menu'));
    }

    public function informasi()
    {
        $menu = 'informasi';
        return view('pages.user.informasi', compact('menu'));
    }

    public function statistik()
    {
        // Menghitung jumlah penerima PKH berdasarkan status
        $menu = 'statistik';
        $sudahDiverifikasi = PenerimaPKH::where('status', 'S')->count();
        $belumDiproses = PenerimaPKH::where('status', 'B')->count();

        // Menyiapkan data untuk chart
        $chartData = [
            'labels' => ['Sudah diverifikasi', 'Belum diproses'],
            'data' => [$sudahDiverifikasi, $belumDiproses]
        ];

        $menu = 'statistik';

        return view('pages.user.statistik', compact('menu', 'chartData'));
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
