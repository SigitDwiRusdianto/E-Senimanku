@extends('layouts.navbar')
@section('content')
<body>
    <section class="Home">
        <p class="seni">Senimanku.</p>
        <div class="content"> 
          <p>Hire seniman kreatif di <br> Indonesia</p>
        </div>
        <div class="content2">
          <p> dengan seniman-seniman terbaik yang ada di seluruh <br>Indonesia.</p>
        </div>
        <div>
          <div class="hire">
            <button class="btn">Hire Seniman</button>
          </div>
        </div>
        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <div class="carousel">
            <img src="image/img-1.jpg" alt="img" draggable="false">
            <img src="image/img-2.jpg" alt="img" draggable="false">
            <img src="image/img-3.jpg" alt="img" draggable="false">
            <img src="image/img-4.jpg" alt="img" draggable="false">
            <img src="image/img-5.jpg" alt="img" draggable="false">
            <img src="image/img-6.jpg" alt="img" draggable="false">
            <img src="image/img-7.jpg" alt="img" draggable="false">
            <img src="image/img-8.jpg" alt="img" draggable="false">
            <img src="image/img-9.jpg" alt="img" draggable="false">
          </div>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
        
      </section>

        <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h5>Pekerjaan</h5>
                <p1><b>Cari pekerjaan kreatif <br> dengan mudah</b></p1>
                <p>Hire seniman secara langsung atau post pekerjaan untuk para <br> seniman dan tunggu proposal dari mereka dalam satu hari.</p>
              <button class="btn">Jelajahi Aset</button>
              </div>
                <container class="kotak">
                  <box class="gambar">
                    <div>
                      <div class="profil">
                        <img src="image/img-1.jpg" alt="profil" class="img">
                        <p>John Cena</p>
                      </div>
                        <h4>Landing page Website e-learning</h4>
                        <p>Kita membutuhkan seorang Website Designer untuk membuat design landing page. Untuk brand identity nya telah disediakan,
                        sehingga hanya membuat design landing pagenya saja sesuai dengan brand identity yang ada.</p>
              </div>
                  <button class="btn2">Website design</button>
                  <button class="btn2">Figma</button>
                  <button class="btn2">Landing Page design</button>
                  </box>
                
                <box class="gambar">
                  <div>
                    <div class="profil">
                      <img src="image/img-1.jpg" alt="profil" class="img">
                      <p>John Cena</p>
                    </div>
                  <h4>Landing page Website e-learning</h4>
                  <p>Kita membutuhkan seorang Website Designer untuk membuat design landing page. Untuk brand identity nya telah disediakan,
                    sehingga hanya membuat design landing pagenya saja sesuai dengan brand identity yang ada.</p>
                </div>
                <button class="btn2">Website design</button>
                <button class="btn2">Figma</button>
                <button class="btn2">Landing Page design</button>
                </box>
              </container>
        </div>
        </section>

        <section class="about-packages">
          <div class="row">
              <div class="about-colpackages">
                <img src="image/gambar.jpg">
              </div>
              <div class="about-col">
                <h1>John Cena</h1>
                  <p>Seniman Surrealism Painting, Surabaya.</p>
                  <br>
                  <p>We really love the quality of Senimanku’s artists work. They created some concepts, designed a solution with a nicely structured file, and ensure the whole process ran smoothly. We’re glad to collaborate with artists in Senimanku.</p>
              </div>
          </div>
      </section>

      <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h5>Hire Seniman</h5>
                <p1><b>Hire seniman langsung  atau post pekerjaan.</b></p1>
                <p>Hire seniman secara langsung atau post pekerjaan untuk para seniman dan tunggu proposal dari mereka dalam satu hari.</p>
              <button class="btn">Jelajahi Seniman</button>
              <button class="btn">Post Pekerjaan</button>
              </div>
                <container class="kotak">
                  <box class="card">
                    <div class="card" style="width: 18rem;">
                      <img src="image/gambar.jpg" class="card-img-top" alt="profil">
                      <p>Ronald Richards</p>
                      <p>Surakarta, Indonesia</p>
                      <div class="button-group">
                        <button class="btn2">Full-Time</button>
                        <button class="btn2">Freelancer</button>
                      </div>
                      <div style="width: 100%; height: 100%; justify-content: center; align-items: center; display: inline-flex">
                        <img style="flex: 1 1 0; height: 43.31px; border-radius: 4.81px; margin-right: 10px; margin-top: 10px; margin-left: 10px;" src="image/gambar.jpg"/>
                        <img style="flex: 1 1 0; height: 43.31px; border-radius: 4.81px; margin-right: 10px; margin-top: 10px; margin-left: 10px;" src="image/gambar.jpg"/>
                        <img style="flex: 1 1 0; height: 43.31px; border-radius: 4.81px; margin-right: 10px; margin-top: 10px; margin-left: 10px;" src="image/gambar.jpg"/>
                    </div>
                      <div class="card-body">
                        <button class="btn" style="width: 120px; height: 40px;">Ikuti</button>
                        <button class="btn" style="width: 120px; height: 40px;">Hire</button>
                      </div>
                    </div>
                  </box>
                
                  <box class="card" style="margin-top: 10px;">
                    <div class="card" style="width: 18rem;">
                      <img src="image/gambar.jpg" class="card-img-top" alt="profil">
                      <p>Ronald Richards</p>
                      <p>Surakarta, Indonesia</p>
                      <div class="button-group">
                        <button class="btn2">Full-Time</button>
                        <button class="btn2">Freelancer</button>
                      </div>
                      <div style="width: 100%; height: 100%; justify-content: center; align-items: center; display: inline-flex">
                        <img style="flex: 1 1 0; height: 43.31px; border-radius: 4.81px; margin-right: 10px; margin-top: 10px; margin-left: 10px;" src="image/gambar.jpg"/>
                        <img style="flex: 1 1 0; height: 43.31px; border-radius: 4.81px; margin-right: 10px; margin-top: 10px; margin-left: 10px;" src="image/gambar.jpg"/>
                        <img style="flex: 1 1 0; height: 43.31px; border-radius: 4.81px; margin-right: 10px; margin-top: 10px; margin-left: 10px;" src="image/gambar.jpg"/>
                    </div>
                      <div class="card-body">
                        <button class="btn" style="width: 120px; height: 40px;">Ikuti</button>
                        <button class="btn" style="width: 120px; height: 40px;">Hire</button>
                      </div>
                    </div>
                  </box>
              </container>
        </div>
        </section>

        <section class="about-packages">
          <div class="row">
              <div class="about-colpackages">
                <img src="image/gambar.jpg">
              </div>
              <div class="about-col">
                <h1>Temukan berbagai aset menarik untuk projectmu</h1>
                  <p>Hire seniman secara langsung atau post pekerjaan untuk para seniman dan tunggu proposal dari mereka dalam satu hari.</p>
                  <button class="btn">Jelajahi Aset</button>
                </div>
          </div>
      </section>

      <div style="padding:50px 50px;">
        <div class="lp">
        <h1>Hasil dari para top seniman <br>di Senimanku</h1>
        <button class="btn">Jelajahi Inspirasi</button>
        </div>
      </div>

      <section class="gallery">
        <div class="box-container">
          <div class="box">
            
            <div class="dream">
              <img src="image/gambar.jpg">
               <img src="image/gambar.jpg">
                <img src="image/gambar.jpg">
                 <img src="image/gambar.jpg">
                  <img src="image/gambar.jpg">
                  
            </div>
      
              <div class="dream">
              <img src="image/gambar.jpg">
               <img src="image/gambar.jpg">
                <img src="image/gambar.jpg">
                 <img src="image/gambar.jpg">
                  <img src="image/gambar.jpg">
                  
            </div>
      
              <div class="dream">
              <img src="image/gambar.jpg">
               <img src="image/gambar.jpg">
                <img src="image/gambar.jpg">
                 <img src="image/gambar.jpg">
                  <img src="image/gambar.jpg">
                  
            </div>
          </div>
        </div>
      </section>

      
<script src="script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  @endsection