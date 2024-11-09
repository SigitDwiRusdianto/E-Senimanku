<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_product = Product::join('penjual', 'penjual.id', '=', 'product.penjual_id')
        ->select('product.nama', 'product.jenis','product.price', 'product.stok', 'penjual.nama_toko', 'product.deskripsi_barang')
        ->get();
        return $ar_product;
    }
}
