<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan_222406;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private $menu;
    public function __construct()
    {
        $this->menu = 'pelanggan';
    }
    public function index()
    {

        $menu = $this->menu;
        $data = Pelanggan_222406::all();

        return view('pages.admin.pelanggan.index', compact('menu', 'data'));
    }

    public function store(Request $request)
    {

        $menu = $this->menu;
        $req = $request->all();
        $req['tgl_terdaftar_222406'] = Carbon::now();
        $data = Pelanggan_222406::create($req);

        return response()->json(['data' => $data, 'success' => true]);

        // return redirect()->route('pelanggan.index');
    }

    public function edit(Request $request)
    {

        $menu = $this->menu;
        $data = Pelanggan_222406::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {

        $menu = $this->menu;
        $req = $request->all();
        // dd($request->all());
        $data = Pelanggan_222406::find($request->id);
        $data->update($req);


        return response()->json([
            'data' => $data,
            'success' => true
        ]);
    }

    public function delete($id)
    {
        $user = Pelanggan_222406::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}
