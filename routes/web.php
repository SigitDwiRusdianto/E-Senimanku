<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\FavoritPenjualController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePenjualController;
use App\Http\Controllers\KatalogProdukController;
use App\Http\Controllers\DesainerController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InspirasiController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProductController::class, 'halaman_awal'])->name('halaman_awal');

Route::get('/seniman', [DesainerController::class, 'halaman_seniman'])->name('halaman_seniman');


Route::get('/katalog_produk', [KatalogProdukController::class, 'index'])->name('katalog_produk');
Route::post('/filter_produk', [KatalogProdukController::class, 'filter_produk'])->name('filter_produk');
Route::post('/search_produk', [KatalogProdukController::class, 'store'])->name('search_produk');
Route::get('/detail_produk/{id}', [KatalogProdukController::class, 'show'])->name('detail_produk');

Route::get('/inspirasi', [InspirasiController::class, 'halaman_inspirasi'])->name('halaman_inspirasi');

// Route::get('/about_us', function () {
//     $title = "About Us";
//     return view('pages-user.aboutUs', compact('title'));
// })->name('about_us');


Route::get('/contact_us', function () {
    $title = "Contact Us";
    return view('pages-user.contactUs', compact('title'));
})->name('contact_us');

Auth::routes();

// menu yang dapat di akses hanya user dengan role admin
Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/home_admin', [HomeAdminController::class, 'index'])->name('home_admin');

    Route::prefix('penjual')->group(function () {
        Route::get('/', [PenjualController::class, 'index'])->name('penjual');
        Route::get('/create', [PenjualController::class, 'create'])->name('penjual-create');
        Route::get('/{id}', [PenjualController::class, 'show'])->name('penjual-detail');
        Route::get('/{id}/edit', [PenjualController::class, 'edit'])->name('penjual-edit');
        Route::post('/store', [PenjualController::class, 'store'])->name('penjual-store');
        Route::put('/{id}/update', [PenjualController::class, 'update'])->name('penjual-update');
        Route::delete('/{id}/destroy', [PenjualController::class, 'destroy'])->name('penjual-hapus');
    });
});

// menu yang dapat di akses hanya user dengan role penjual
    Route::get('/home_penjual', [HomePenjualController::class, 'index'])->name('home_penjual');
Route::middleware(['role:Admin,Penjual'])->group( function () {
    Route::get('/product_pdf', [ProductController::class, 'pdf'])->name('produk-pdf');
    Route::get('/transaksi_pdf', [TransaksiController::class, 'pdf'])->name('transaksi-pdf');
    Route::get('/product_excel', [ProductController::class, 'excel'])->name('produk-excel');

    Route::prefix('produk')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('produk');
        Route::get('/create', [ProductController::class, 'create'])->name('produk-create');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('produk-edit');
        Route::post('/store', [ProductController::class, 'store'])->name('produk-store');
        Route::put('/{id}/update', [ProductController::class, 'update'])->name('produk-update');
        Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('produk-hapus');
        Route::get('/hapus_gallery/{id}', [ProductController::class, 'hapus_gallery'])->name('hapus_gallery');
    });


    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi');
        Route::get('/create', [TransaksiController::class, 'create'])->name('transaksi-create');
        Route::get('/{id}', [TransaksiController::class, 'show'])->name('transaksi-detail');
        Route::get('/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi-edit');
        Route::post('/store', [TransaksiController::class, 'store'])->name('transaksi-store');
        Route::put('/{id}/update', [TransaksiController::class, 'update'])->name('transaksi-update');
        Route::delete('/{id}/destroy', [TransaksiController::class, 'destroy'])->name('transaksi-hapus');
    });
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/edit_profile/{id}', [ProfileController::class, 'edit']);
    Route::put('/edit_profile/{id}/update', [ProfileController::class, 'update'])->name('profile-update');
});

// menu yang dapat di akses hanya user dengan role User
Route::group(['middleware' => ['auth', 'role:Pembeli']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('favorit')->group(function () {
        Route::get('/', [FavoritController::class, 'index'])->name('favorit');
        Route::get('/{id}', [FavoritController::class, 'show'])->name('favorit-create');
        Route::delete('/{id}/destroy', [FavoritController::class, 'destroy'])->name('favorit-hapus');
    });

    Route::prefix('favoritpenjual')->group(function () {
        Route::get('/', [FavoritPenjualController::class, 'index'])->name('favoritpenjual');
        Route::get('/{id}', [FavoritPenjualController::class, 'show'])->name('favoritpenjual-create');
        Route::delete('/{id}/destroy', [FavoritPenjualController::class, 'destroy'])->name('favoritpenjual-hapus');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/{id}', [ProfileController::class, 'show'])->name('profile-edit');
    });

    Route::prefix('pesanan')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('pesanan');
        Route::get('/{id}', [PesananController::class, 'show'])->name('pesanan-create');
        Route::post('/store', [PesananController::class, 'store'])->name('pesanan-store');
        Route::delete('/{id}/destroy', [PesananController::class, 'destroy'])->name('pesanan-hapus');
        Route::post('/update-quantity',  [PesananController::class, 'edit'])->name('update-quantity');
    });

    Route::prefix('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
        Route::get('/{id}', [CheckoutController::class, 'show'])->name('change-status');
        Route::post('/store', [CheckoutController::class, 'store'])->name('checkout-store');
    });

    Route::prefix('profile')->group(function () {
        Route::post('/store', [CheckoutController::class, 'store'])->name('checkout-store');
    });

    Route::prefix('history')->group(function () {
        Route::get('/', [HistoryController::class, 'index'])->name('history');
        Route::get('/dikirim', [HistoryController::class, 'dikirim'])->name('dikirim');
        Route::get('/diterima', [HistoryController::class, 'diterima'])->name('diterima');
        Route::get('/belum_dibayar', [HistoryController::class, 'belum_dibayar'])->name('belum_dibayar');
        Route::get('/{id}', [HistoryController::class, 'show'])->name('history-show');
        Route::get('/{id}/edit', [HistoryController::class, 'edit'])->name('history-edit');
        Route::put('/{id}/update', [HistoryController::class, 'update'])->name('history-update');
    });

    Route::prefix('rating')->group(function () {
        Route::get('/{id}', [RatingController::class, 'show'])->name('rating-show');
        Route::post('/store', [RatingController::class, 'store'])->name('rating-store');
    });



    //midtrans gateway
    Route::get('payment/success', [CheckoutController::class, 'midtransCallBack']);
    Route::post('payment/success', [CheckoutController::class, 'midtransCallBack']);
});
