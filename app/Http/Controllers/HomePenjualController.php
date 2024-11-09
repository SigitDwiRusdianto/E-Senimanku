<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Dashboard";
        // $total_makanan =  DetailTransaksi::join('product', 'detail_transaksi.product_id', '=', 'product.id')
        //     ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
        //     ->where('product.penjual_id', Auth::user()->penjual->id)
        //     ->where('transaksi.tanggal', date('Y-m-d'))
        //     ->where('product.jenis', 'Makanan')
        //     ->where('transaksi.status', 'Diproses')->count();

        $total_mobile =  DetailTransaksi::join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->where('product.penjual_id', Auth::user()->penjual->id)
            ->where('transaksi.tanggal', date('Y-m-d'))
            ->where('product.jenis', 'Mobile')
            ->where('transaksi.status', 'Diproses')->count();
        // $total_minuman =  DetailTransaksi::join('product', 'detail_transaksi.product_id', '=', 'product.id')
        //     ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
        //     ->where('product.penjual_id', Auth::user()->penjual->id)
        //     ->where('transaksi.tanggal', date('Y-m-d'))
        //     ->where('product.jenis', 'Minuman')
        //     ->where('transaksi.status', 'Diproses')->count();
            $total_logo =  DetailTransaksi::join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->where('product.penjual_id', Auth::user()->penjual->id)
            ->where('transaksi.tanggal', date('Y-m-d'))
            ->where('product.jenis', 'Logo')
            ->where('transaksi.status', 'Diproses')->count();
        $total_website =  DetailTransaksi::join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->where('product.penjual_id', Auth::user()->penjual->id)
            ->where('transaksi.tanggal', date('Y-m-d'))
            ->where('product.jenis', 'Website')
            ->where('transaksi.status', 'Diproses')->count();
        $total_penjualan =  Transaksi::with('detail_transaksi.product')
            ->whereHas('detail_transaksi.product', function ($query) {
                $query->where('penjual_id', Auth::user()->penjual->id);
            })
            ->where('tanggal', date('Y-m-d'))
            ->sum('transaksi.total');
            // $penjualan_makanan = DetailTransaksi::select(DB::raw('COUNT(product.id) as makanan, MONTH(transaksi.tanggal) as bulan, YEAR(transaksi.tanggal) as tahun'))
            // ->join('product', 'detail_transaksi.product_id', '=', 'product.id')
            // ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            // ->where('product.penjual_id', Auth::user()->penjual->id)
            // ->where('product.jenis', 'Makanan')
            // ->whereYear('transaksi.tanggal', date('Y'))
            // ->groupBy('bulan', 'tahun')
            // ->orderBy('bulan', 'desc')
            // ->get();

            $penjualan_mobile = DetailTransaksi::select(DB::raw('COUNT(product.id) as mobile, MONTH(transaksi.tanggal) as bulan, YEAR(transaksi.tanggal) as tahun'))
            ->join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->where('product.penjual_id', Auth::user()->penjual->id)
            ->where('product.jenis', 'Mobile')
            ->whereYear('transaksi.tanggal', date('Y'))
            ->groupBy('bulan', 'tahun')
            ->orderBy('bulan', 'desc')
            ->get();
        
            // $penjualan_minuman = DetailTransaksi::select(DB::raw('COUNT(product.id) as minuman, MONTH(transaksi.tanggal) as bulan, YEAR(transaksi.tanggal) as tahun'))
            // ->join('product', 'detail_transaksi.product_id', '=', 'product.id')
            // ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            // ->where('product.penjual_id', Auth::user()->penjual->id)
            // ->where('product.jenis', 'Minuman')
            // ->whereYear('transaksi.tanggal', date('Y'))
            // ->groupBy('bulan', 'tahun')
            // ->orderBy('bulan', 'desc')
            // ->get();

            $penjualan_logo = DetailTransaksi::select(DB::raw('COUNT(product.id) as logo, MONTH(transaksi.tanggal) as bulan, YEAR(transaksi.tanggal) as tahun'))
            ->join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->where('product.penjual_id', Auth::user()->penjual->id)
            ->where('product.jenis', 'Logo')
            ->whereYear('transaksi.tanggal', date('Y'))
            ->groupBy('bulan', 'tahun')
            ->orderBy('bulan', 'desc')
            ->get();

            $penjualan_website = DetailTransaksi::select(DB::raw('COUNT(product.id) as website, MONTH(transaksi.tanggal) as bulan, YEAR(transaksi.tanggal) as tahun'))
            ->join('product', 'detail_transaksi.product_id', '=', 'product.id')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->where('product.penjual_id', Auth::user()->penjual->id)
            ->where('product.jenis', 'Website')
            ->whereYear('transaksi.tanggal', date('Y'))
            ->groupBy('bulan', 'tahun')
            ->orderBy('bulan', 'desc')
            ->get();
        
        return view('pages-penjual.dashboard', compact('title', 'total_mobile', 'total_logo','total_website', 'total_penjualan', 'penjualan_mobile', 'penjualan_logo', 'penjualan_website'));
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
