<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Penjual";
        $data = User::where('role', 'Penjual')->orderBy('created_at', 'desc')->get();
        return view('pages-admin.user.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Data User';
        return view('pages-admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        $id = mt_rand(1000, 99999);
        $user = User::create([
            'id' => $id,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'Penjual',
        ]);

        Penjual::create([
            'user_id' => $id,
            'nama_toko' => $request->nama_toko,
            'deskripsi_toko' => $request->deskripsi_toko,
        ]);


        Profile::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => null,
            'foto' => 'avatar4.png',
            'user_id' => $id
        ]);

        return redirect('penjual')->with('success', 'Data User berhasil ditambahkan');
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
        $title = 'Edit Data Penjual';
        $data = User::find($id);
        return view('pages-admin.user.update', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
        ]);

        $user = User::where('id', $id)->update([
            'id' => $id,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        Penjual::where('user_id', $id)->update([
            'nama_toko' => $request->nama_toko,
            'deskripsi_toko' => $request->deskripsi_toko,
        ]);


        Profile::where('user_id', $id)->update([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
        ]);

        return redirect('penjual')->with('success', 'Data User berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('penjual')->with('success', 'Data User berhasil Dihapus');
    }
}
