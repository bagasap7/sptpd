<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-SPTPD REMBANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
    </head>
  <body>
   
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">E-STPTD-<b>REMBANG</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link " href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/dashboard">Aplikasi</a>
                </li>
                @auth
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Selamat Datang {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item" href="/dashboard">Logout</button>
                                    </form>
                                </li>
                         
                            </ul>
                            </li>
                        </ul>
                    </div>
                @else
                <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
                </li>

                @endauth
            </ul>
            </div>
        </div>
    </nav>

    <section id="hero">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                 <div class="logo d-flex justify-content-center mb-5">
                    <img src="/img/Kabupaten Rembang.png" alt="">
                    </div> 
                    <h1>PAJAK <b>ONLINE</b> DAERAH</h1>
                    <p class="text-white lh-base fs-5 mb-5">Aplikasi Pajak Daerah Online hadir untuk mempermudah petugas pajak dan masyarakat guna mengecek data perpajakan di lingkungan Pemerintah Daerah Kabupaten Rembang.
                    </p>
                    <a href="" class="btn-mulai text-decoration-none ">Mulai</a>
                    
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,224L40,202.7C80,181,160,139,240,138.7C320,139,400,181,480,208C560,235,640,245,720,218.7C800,192,880,128,960,122.7C1040,117,1120,171,1200,160C1280,149,1360,75,1400,37.3L1440,0L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </section>

    <section id="layanan">
        <div class="container text-center">
            <div class="row ">
                <div class="col-3">
                    <div class="img-thumbnail satu"></div>
                    <h2>Hotel</h2>
                </div>
                <div class="col-3">
                    <div class="img-thumbnail dua"></div>
                      <h2>Restoran</h2>
                </div>
                <div class="col-3">
                    <div class="img-thumbnail tiga"></div>
                      <h2>Hiburan</h2>
                </div>
                <div class="col-3">
                    <div class="img-thumbnail empat"></div>
                      <h2>Parkir</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak">
    <footer class="footer container">
        <h1 class="text-center fw-bold mb-5">Kontak</h1>
        <div class="row">
            <div class="col-6">
            <div class="footer-center">
            <div>
              <i class="fa-solid fa-house"></i>
              <p><span>Kantor</span>Badan Pendapatan, Pengelolaan Keuangan dan Aset Daerah <br> (BPPKAD) Kabupaten Rembang </p>
            </div>
            <div>
              <i class="fa-solid fa-location-dot"></i>
              <p><span>Alamat</span>Jl. Jend. Gatot Subroto No.8, Kutoharjo, Rembang</p>
            </div>
            <div>
            <i class="fa-sharp fa-solid fa-phone"></i>
              <p><span>Telepon</span>08212121212</p>
            </div>
          </div>
            </div>
            <div class="col-6">
                <div class="container map bg-danger" id="map" style="height:150px">
                    <script>
                        var map = L.map('map').setView([51.505, -0.09], 13);

                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        L.marker([51.5, -0.09]).addTo(map)
                            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                            .openPopup();
                    </script>
                </div>

            </div>
        </div>
        
    </footer>
    <p class="text-center">Copyright 2021-2022 © BPPKAD Pemerintah Daerah Kabupaten Rembang</p>
    </section>

     
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>