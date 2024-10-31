<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluhan_222406;
use App\Models\Tanggapan_222406;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    private $menu;
    public function __construct()
    {
        $this->menu = 'tanggapan';
    }
    public function index()
    {

        $menu = $this->menu;
        $data = Tanggapan_222406::all();
        $keluhan =  Keluhan_222406::all();

        return view('pages.admin.tanggapan.index', compact('menu', 'data', 'keluhan'));
    }

    public function store(Request $request)
    {

        $menu = $this->menu;

        Tanggapan_222406::create($request->all());

        return redirect()->route('tanggapan.index');
    }
}
