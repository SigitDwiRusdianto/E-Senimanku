@extends('layouts.topbar')

@section('content')
<!-- banner -->
<div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('<?= url("assets/user/images/bg2.png") ?>');">
    <div class="container">
    <h1 class="text-6xl text-white font-medium mb-4 capitalize" style="text-align: center;">
    Bekerja dengan talenta  <br> kreatif terbaik dunia.
</h1>

        <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
            accusantium perspiciatis, sapiente
            magni eos dolorum ex quos dolores odio</p> -->

            
        <div class="mt-12 " style="text-align: center; ">
            <a href="{{route('katalog_produk')}}" class="bg-blue-600 border border-primary text-white px-8 py-3 font-medium 
                    rounded-md hover:bg-blue-400  hover:text-white">Hire Seniman</a>
        </div>
        
    </div>
</div>
<!-- breadcrumb -->
<!-- <div class="container py-4 gap-3">
    <img src="{{ url('assets/user/images/senimanku.png')}}" alt="AdminLTE Logo" width="20%" class="mt-4" style="opacity: .8">
    <p class="text-justify w-3-5 pt-4">
        E-kantin adalah website yang menyediakan aplikasi jual-beli makanan kantin sekolah secara online. Dengan tampilan menu yang menarik dan informatif, pengguna dapat dengan mudah memilih dan memesan makanan favorit mereka. Pembayaran yang mudah dan aman serta opsi pengiriman yang fleksibel membuat proses pesan makanan di E-kantin menjadi praktis dan efisien. Selain itu, E-kantin juga memberikan manfaat bagi kantin sekolah dengan meningkatkan efisiensi operasional dan memberikan kesempatan untuk mempromosikan menu baru. Dengan semua fitur ini, E-kantin menjadi solusi modern yang memudahkan jual-beli makanan kantin sekolah secara online.<br>
    </p>
</div> -->

<section class="about-packages">
          <div class="row">
              <div class="about-colpackages">
                <img src="{{ url('assets/user/images/gambar.jpg')}}">
              </div>
              <div class="about-col">
                  <p class="text-justify"> Senimanku adalah ruang maya yang luas dan dinamis di mana para desainer dapat menjelajahi batas-batas kreativitas mereka, berbagi ide, dan terinspirasi oleh beragam karya, menciptakan lingkungan online yang kaya akan kolaborasi dan pertukaran gagasan yang tak terbatas..</p>
              </div>
          </div>
      </section>
<!-- ./breadcrumb -->

<!-- product-detail -->
<div class="container grid grid-cols-2 gap-6">
</div>
<!-- ./product-detail -->
<!-- product -->
<div class="container pb-16">
<h2 class="text-2xl font-medium text-gray-800 uppercase mb-6" style="text-align: center;">Hasil dari para top seniman
di Senimanku</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($rekomendasi as $data)
        @php $image = $data->product_galleries[0]['foto']; $rating = ($data->nilai != null ) ? round($data->nilai, 2) : 0; @endphp
        <div class="bg-white shadow rounded overflow-hidden group">
            <div class="relative">
                <img src="{{ url('assets/produk',$image)}}" alt="product 1" style="height: 170px; width: 100%;">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="{{route('detail_produk',$data->id)}}" class="text-white text-lg w-9 h-8 rounded-full bg-blue-600 flex items-center justify-center hover:bg-gray-800 transition" title="view product"><i class="fas fa-eye"></i>
                    </a>
                    <a href="{{route('favorit-create',$data->id)}}" class="text-white text-lg w-9 h-8 rounded-full bg-blue-600 flex items-center justify-center hover:bg-gray-800 transition" title="add to wishlist">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
            </div>
            <div class="pt-4 pb-3 px-4">
                <a href="{{route('detail_produk',$data->id)}}">
                    <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$data->nama}}</h4>
                </a>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">Rp. {{number_format($data->price, 0, ",", ".")}}</p>
                </div>
                <div class="flex items-center"><i class=""></i>
                    <div class="flex gap-1 text-sm text-yellow-400">
                        <span><i class="{{($rating <= 0) ? 'far fa-star' : (($rating > 0 && $rating < 1 ) ? 'fas fa-star-half-alt' : 'fas fa-star')}}"></i></span>
                        <span><i class="{{($rating <= 1) ? 'far fa-star' : (($rating > 1 && $rating < 2 ) ? 'fas fa-star-half-alt' : 'fas fa-star')}}"></i></span>
                        <span><i class="{{($rating <= 2) ? 'far fa-star' : (($rating > 2 && $rating < 3 ) ? 'fas fa-star-half-alt' : 'fas fa-star')}}"></i></span>
                        <span><i class="{{($rating <= 3) ? 'far fa-star' : (($rating > 3 && $rating < 4 ) ? 'fas fa-star-half-alt' : 'fas fa-star')}}"></i></span>
                        <span><i class="{{($rating <= 4) ? 'far fa-star' : (($rating > 4 && $rating < 5 ) ? 'fas fa-star-half-alt' : 'fas fa-star')}}"></i></span>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">({{$rating}})</div>
                </div>
            </div>

            @if($data->stok != 0)
            <a href="{{route('pesanan-create',$data->id)}}" class="block w-full py-1 text-center text-white bg-blue-600 border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Tambah
                ke Pesanan</a>
            @else
            <button disabled class="block w-full py-1 text-center text-white bg-blue-300 border border-blue-300 rounded-b">Tambah
                ke Pesanan</button>
            @endif
        </div>
        @endforeach
    </div>
</div>
<!-- ./product -->
@endsection

<style>
   
   .about-us{
  display: flex;
  padding: 60px 35px;
  flex-direction: column; /* Mengatur tata letak ke vertikal */
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-attachment: scroll;
}
.about-col{
  flex-basis: 48%;
  padding: 3px 2px;
}
.about-col p1{
  width: 50%;
  text-align: center;
  color: black;
  font-size: 55px;
  font-family: Zodiak Variable;
  font-weight: 540;
  line-height: 60px;
  word-wrap: break-word;
}

.about-col img{
  width: 50%;
}
.about-col h1{
  padding-top: 0; 
}
.about-col p{
  font-size: 20px;
  padding: 15px 0 25px;
}
.row{
  margin-top: 5%;
  display: flex;
  justify-content: space-between;
  cursor: pointer;

}

h5{
  margin-bottom:20px;
  color:blue;
}

.kotak {
  flex-basis: 48%;
  padding: 10px 10px 10px 10px;
  border-radius: 30px;
  border: 30px solid rgba(173, 216, 230, 0.2); /* Garis kotak dengan warna biru muda (70% transparan) */
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column; /* Mengatur tata letak ke bawah */
  /* Opacity tidak diperlukan untuk mengatur transparansi garis */
}

.gambar {
  border-radius:20px;
  border: 2px solid rgba(173, 216, 230, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  padding:20px 20px 20px 20px;
  max-width: 100%; /* Maksimum lebar gambar */
  max-height: 100%; /* Maksimum tinggi gambar */
  display: block; /* Agar gambar ditampilkan sebagai elemen blok */
  margin: auto; /* Menggeser gambar ke tengah kotak */
  margin-top:10px;
}

.gambar p{
  font-size:12px;
}

.gambar h4{
  font-size:20px;
  font-weight: bold;
}

.gambar img {
  border-radius: 99%; /* Membuat gambar menjadi lingkaran */
  max-width: 3.5%; /* Maksimum lebar gambar */
  max-height: 3.5%; /* Maksimum tinggi gambar */
  display: block; /* Agar gambar ditampilkan sebagai elemen blok */
  teks-align: left; /* Menggeser gambar ke sebelah kiri */
}

.profil {
  display: flex; /* Menggunakan flexbox untuk mengatur tata letak */
  align-items: center; /* Mengatur elemen secara vertikal */
  margin-bottom: 15px;
}

.profil .img {
  max-width: 30px; /* Maksimum lebar gambar */
  max-height: 30px; /* Maksimum tinggi gambar */
  margin-right: 10px; /* Jarak antara gambar dan teks */
}

p {
  margin-top:10px;
  margin: 0; /* Menghapus margin bawaan paragraf */
}


.btn2{
  margin-top:10px;
  border-radius: 30px;
  background-color: rgba(173, 216, 230, 0.6); /* Latar belakang transparan */
  color: rgba(0, 0, 0, 0.6); /* Warna teks tombol saat kondisi normal */
  transition: background-color 0.3s, color 0.3s;
  padding:4px 4px 4px 4px;
  border:none;
}

/* CSS untuk tombol */
.btn {
  border-radius: 30px;
  background-color: blue; /* Latar belakang transparan */
  color: white; /* Warna teks tombol saat kondisi normal */
  transition: background-color 0.3s, color 0.3s; /* Animasi perubahan warna latar belakang dan teks selama 0.3 detik */
}

/* CSS untuk tombol saat dihover */
.btn:hover {
  background-color: white; /* Latar belakang tombol menjadi putih saat dihover */
  color: blue; /* Warna teks tombol menjadi biru saat dihover */
}

/* CSS untuk tombol saat diklik */
.btn:active {
  background-color: white; /* Latar belakang tombol tetap putih saat diklik */
  color: blue; /* Warna teks tombol tetap biru saat diklik */
}

.about-packages{
  display: flex;
  padding: 0 35px;
  flex-direction: column; /* Mengatur tata letak ke vertikal */
  align-items: center;
  justify-content: center;
  min-height: 50vh;
  background-size: 100% 100%;
  background-attachment: scroll;
  background-color: rgba(173, 216, 230, 0.2); /* Latar belakang transparan */
  width: 100%;
  margin: auto;
  padding-top: 5px;
  padding-bottom: 5px;
}
.about-packages .about-col{
  align-items: center; /* Mengatur elemen secara vertikal */
  margin-top: 15px;
}
.about-colpackages{
  flex-basis: 48%;
  padding: 5px 2px;
  font-size: 20px;
  align-items: center;
  justify-content: center;
}
.about-colpackages img{
  width: 70%;
}
.about-colpackages h1{
  padding-top: 0; 
}
.about-colpackages p{
  padding: 15px 0 25px;
}
</style>