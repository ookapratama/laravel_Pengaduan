<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    private $menu;
    public function __construct($menu = 'akun')
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = $this->menu;
        $data  = User::all();
        return view('pages.admin.akun.index', compact('menu', 'data'));
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['status' => 'success', 'message' => 'akun store']);
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->password);
        $req = $request->all();
        $user = User::findOrFail($request->id);
        if ($request->password == null) {
            unset($req['password']);
        }
        else {
            $req['password'] = Hash::make($request->password);
        }

        $user->update($req);


        return response()->json(['status' => 'success', 'message' => 'akun update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'akun delete']);
    }
}
