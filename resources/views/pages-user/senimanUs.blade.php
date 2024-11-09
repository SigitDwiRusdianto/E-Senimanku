@extends('layouts.topbar')

@section('content')
<!-- banner -->
<div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('<?= url("assets/user/images/bg2.png") ?>');">
    <div class="container">
    <h1 class="text-6xl text-white font-medium mb-4 capitalize" style="text-align: center;">
    Bekerja dengan talenta  <br> kreatif terbaik dunia.
</h1>
<br>
            <div class="flex justify-center items-center">
    <form action="{{route('search_produk')}}" method="post" class="w-full max-w-xl relative flex">
        @csrf
        <span class="absolute left-4 top-3 text-lg text-gray-400">
            <i class="fa-solid fa-magnifying-glass"></i>
        </span>
        <input type="text" name="search" id="search" class="w-full border border-blue-400 border-r-0 pl-12 py-3 pr-3 rounded-l-md hidden md:flex focus:outline-none" placeholder="search" style="padding-top: 2%;">
        <button type="submit" class="bg-blue-600 border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition md:flex hidden" style="padding-top: 2%;">Search</button>
    </form>
</div>
<br>
<div class="container-fluid">
  <p style="text-align: center; color: aliceblue;">Pencarian terpopuler</p>
  <br>

  <div style="display: flex; justify-content: center;">
    @foreach($kategoris as $key => $kategori)
      <button class="badge btn btn-light" style="margin-right: 10px;">{{ $kategori->jenis }}</button>
    @endforeach
  </div>
</div>



        
    </div>
        <div class="mt-12 " style="text-align: center; ">
            <a href="{{route('katalog_produk')}}" class="bg-blue-600 border border-primary text-white px-8 py-3 font-medium 
                    rounded-md hover:bg-blue-400  hover:text-white">Hire Seniman</a>
        </div>
        
        
    </div>
</div>

</div>
<div class="container-fluid">
    <div class="row">
        @foreach($penjualsWithProfile as $penjual)
            <div class="col-lg-4 col-sm-3 mb-4">
                <div class="card text-center bd-placeholder-img" style="width: 20rem;">
                    <img class="img justify-content-center" src="{{ url('assets/profile',  $penjual['foto']) }}" />
                    <div class="profiles" style="text-align: center; ">{{ $penjual['deskripsi_toko'] }}</div>

                    <div class="name" style="text-align: center;">
  {{ $penjual['nama_toko'] }}
</div>

                    <div class="desc">
                        {{ $penjual['alamat'] }} - indonesia
                    </div>
                    <div>
                        <badge pill bg="dark" text="dark" class="badge-p">
                            Full-Time
                        </badge>
                        <badge pill bg="dark" text="dark" class="badge-p">
                            Freelancer
                        </badge>
                    </div>
                    <figure style="display: flex; justify-content: space-between; align-items: center;">
                        <img src="{{ url('assets/user/images/img-1.jpg')}}" style="max-width: 100%; height: auto;" class="rounded float-left img-karya" alt="...">
                        <img src="{{ url('assets/user/images/img-1.jpg')}}" style="max-width: 100%; height: auto;" class="rounded float-left img-karya" alt="...">
                        <img src="{{ url('assets/user/images/img-1.jpg')}}" style="max-width: 100%; height: auto;" class="rounded float-left img-karya" alt="...">
                    </figure>
                    <div>
                    <button class="button1">
    <a href="">
        Ikuti
    </a>
</button>



                        <button class="button">
    <a href="{{ route('katalog_produk') }}">
        Hire
    </a>
</button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

<style>

.button {
    width: 120px;
    height: 45px;
    left: 502px;
    top: 499px;
  
    background: #444CE7;
    color: white;
    border-radius: 30px;
    padding: 10px 20px;
    border: none;
    margin-top: 10px;
  }

  .button1 {
    width: 120px;
    height: 45px;
    left: 502px;
    top: 499px;
    color: #00d0ff;
    color: #444CE7;
    border-radius: 30px;
    padding: 10px 20px;
    border: none;
    margin-top: 10px;
    background: gainsboro;
  }


  .tombol {
    text-transform: uppercase;
    border-radius: 40px;
  }

 
    .badge {
  width: 165px;
  height: 40px;
  border-radius: 60px;
  padding: 10px 20px;
  justify-content: center;
  align-items: center;
  color: white;
  background: rgba(255, 255, 255, 0.2);
  text-align: center;
  margin-right: 10px; /* atau nilai margin yang sesuai */
}
.badge-p{
    width: 150px;
    height: 35px;
    left: 502px;
    top: 499px;
    border-radius: 60px;
    padding: 10px 20px;
    justify-content: center;
    align-items: center;
    color: black;
    background: rgba(255, 255, 255, 0.2);
  }

  .badge1{
    width: 15%;
    height: 20px;
    display: flex;
    align-items: center;
    border-radius: 60px;
    padding: 10px 20px;
    justify-content: center;
    align-items: center;
  }

  .col-5 p {
    color: black;
  }

  .nav-link a {
    color: black;
  }

/*  profile */
.card {
    width: 100%;
    background-color: white;
    padding: 40px;
    border-radius: 35px;
    margin-top: 30px;
    padding: 10px 20px;
    border: 2px solid #5ce2ff; /* Add this line for the border */
    margin-left: 20px; /* Add this line for left margin */
  }
  
  .profiles {
    font-weight: 400;
    font-size: 14px;
    line-height: 21px;
    color: red;
  }
  
  .name {
    font-weight: 600;
    font-size: 24px;
    line-height: 24px;
    color: #494949;
    padding: 4px 0 10px 0;
    text-align: center;
  }
  
  .desc {
    font-weight: 500;
    font-size: 14px;
    line-height: 21px;
    color: #494949;
    margin-bottom: 1rem;
  }

  .img {
    width: 70px;
    height: 70px; 
    border: 4px solid #5ce2ff;
    border-radius: 50%;
    position: relative;
    justify-content: center;
    align-items: center;
  }

  .img-karya {
    width: 70px;
    height: 70px; 
  }

  .row {
    display: flex;
    flex-direction: row;
  }
 
  
</style>