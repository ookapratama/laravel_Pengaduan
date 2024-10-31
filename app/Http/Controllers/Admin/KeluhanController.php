<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKeluhan_222406;
use App\Models\Keluhan_222406;
use App\Models\Pelanggan_222406;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    private $menu;
    public function __construct()
    {
        $this->menu = 'keluhan';
    }
    public function index()
    {

        $menu = $this->menu;
        $data = Keluhan_222406::all();
        $kategori = KategoriKeluhan_222406::all();
        $pelanggan = Pelanggan_222406::all();

        return view('pages.admin.keluhan.index', compact('menu', 'data', 'kategori', 'pelanggan'));
    }

    public function store(Request $request)
    {

        $menu = $this->menu;
        
        Keluhan_222406::create($request->all());

        return redirect()->route('keluhan.index');
    }
}
