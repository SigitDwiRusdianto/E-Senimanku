<?php

namespace App\Http\Controllers;

use App\Models\FavoritPenjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritPenjualController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "WishlistPenjual";
        $favoritpenjual = FavoritPenjual::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages-user.wishlistpenjual', compact('title', 'favoritpenjual'));
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
        $favoritpenjual = FavoritPenjual::where('penjual_id', $id)->first();

        if ($favoritpenjual == null) {
            FavoritPenjual::create([
                'user_id' => Auth::user()->id,
                'penjual_id' => $id
            ]);
            return back()->with('success', 'Favorit berhasil ditambahkan');
        } else {
            return back()->with('warning', 'Favorit sudah pernah ditambahkan');
        }
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
        $data = FavoritPenjual::find($id);
        $data->delete();

        return back()->with('success', 'Favorit berhasil dihapus');
    }
}
