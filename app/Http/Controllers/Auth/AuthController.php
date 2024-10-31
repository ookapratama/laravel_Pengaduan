<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    private $menu;
    public function __construct($menu = 'auth')
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $menu = $this->menu;
    //     // $datas = PenerimaPKH::latest()->first();
    //     // $datas = PenerimaPKH::orderByDesc('id')->get();
    //     return view('pages.auth.login', compact('menu'));
    // }

    public function login()
    {
        $menu = $this->menu;
        // $datas = PenerimaPKH::latest()->first();
        // $datas = PenerimaPKH::orderByDesc('id')->get();
        return view('pages.auth.login', compact('menu'));
    }

    public function login_user()
    {
        $menu = $this->menu;
        // $datas = PenerimaPKH::latest()->first();
        // $datas = PenerimaPKH::orderByDesc('id')->get();
        return view('pages.auth.login-user', compact('menu'));
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
    public function cek_login(Request $request)
    {
        $r = $request->all();
        // dd($r);
        if ($request->role == null) {
            $request->role == 'admin';
        }
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password', 'role');

        if (Auth::attempt($credentials)) {
            Session::put('role', Auth::user()->role);
            Session::put('name', Auth::user()->name);
            // dd($request->session()->has('role'));
            // Authentication passed, redirect to intended page
            return redirect()->intended('admin');
        }

        // Authentication failed, redirect back with input
        return redirect()->back()->withInput($request->only('name'))->withErrors([
            'name' => 'Invalid credentials',
        ]);
    }

    public function cek_login_user(Request $request)
    {
        $r = $request->all();
        // dd($r);
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page
            return redirect()->intended('admin');
        }

        // Authentication failed, redirect back with input
        return redirect()->back()->withInput($request->only('name'))->withErrors([
            'name' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
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
