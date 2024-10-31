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

        $data = Tanggapan_222406::create($request->all());

        return response()->json(['data' => $data, 'success' => true]);

        // return redirect()->route('tanggapan.index');
    }

    public function edit(Request $request)
    {

        $menu = $this->menu;
        $data = Tanggapan_222406::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {

        $menu = $this->menu;
        $req = $request->all();
        // dd($request->all());
        $data = Tanggapan_222406::find($request->id);
        $data->update($req);


        return response()->json([
            'data' => $data,
            'success' => true
        ]);
    }

    public function delete($id)
    {
        $user = Tanggapan_222406::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'tanggapan delete']);
    }


}
