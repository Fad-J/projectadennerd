<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Madani</title>

    <link rel="stylesheet"
    href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">

    <style>

        body{
             background:#eef2f7;
        }

        .btn-success{
            background:linear-gradient(135deg,#198754,#20c997);
            border:none;
        }

        .btn-success:hover{
            transform:translateY(-3px);
            transition:.3s;
        }

        .hero{
            position:relative;
            height:650px;
            overflow:hidden;
        }

        .hero-content{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            z-index:2;
            color:white;
            text-align:center;
            width:100%;
        }

        .hero::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.5);
            z-index:1;
        }

        .carousel-item img{
            height:650px;
            object-fit:cover;
        }

        .stat-card,
        .feature-card{
            transition:.4s;
        }

        .stat-card:hover,
        .feature-card:hover{
            transform:translateY(-10px);
            box-shadow:0 20px 40px rgba(0,0,0,.15)!important;
        }

        .feature-card{
            border:none;
            border-radius:15px;
        }

        .hero-content{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            z-index:2;
            width:100%;
            display:flex;
            justify-content:center;
        }

        .hero-box{
            background:rgba(0,0,0,0.55);
            backdrop-filter:blur(8px);
            border-radius:20px;
            padding:40px;
            text-align:center;
            color:white;
            max-width:700px;
            width:90%;
            box-shadow:0 8px 25px rgba(0,0,0,0.3);
        }

        .hero-box h1{
            color:#fff;
            text-shadow:
                0 0 10px rgba(255,255,255,.5),
                0 0 20px rgba(255,255,255,.3),
                0 0 40px rgba(25,135,84,.4);
        }

        .hero-box p{
            text-shadow:1px 1px 5px rgba(0,0,0,0.8);
        }

        .hero-box{
             animation:fadeUp 1.2s ease;
        }

        @keyframes fadeUp{
            from{
                opacity:0;
                transform:translateY(40px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

    </style>

</head>

<body>

<!-- HERO -->
<section class="hero">

    <div id="heroCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('storage/Hero/perpus1.jpeg') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('storage/Hero/perpus2.jpeg') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('storage/Hero/perpus3.jpeg') }}"
                     class="d-block w-100">
            </div>

        </div>

    </div>

    <div class="hero-content">

    <div class="hero-box">

        <h1 class="display-4 fw-bold">
            📚 Library Management System
        </h1>

        <p class="lead mt-3">
            Sistem Informasi Perpustakaan Modern
            untuk memudahkan pencarian dan
            peminjaman buku secara online.
        </p>

        <div class="mt-4">

            <a href="/login"
               class="btn btn-success btn-lg me-2">
                Login
            </a>

            <a href="/signin"
               class="btn btn-outline-light btn-lg">
                Register
            </a>

        </div>

    </div>

</div>

</section>

<!-- STATISTIK -->
<div class="container mt-5">

    <h2 class="text-center mb-4">
        Statistik Perpustakaan
    </h2>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow">

                <div class="card-body text-center">

                    <h5>📚 Total Buku</h5>

                    <h1 class="counter">{{ $totalBuku }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow">

                <div class="card-body text-center">

                    <h5>👥 Pengguna</h5>

                    <h1 class="counter">{{ $totalUser }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow">

                <div class="card-body text-center">

                    <h5>📖 Kategori</h5>

                    <h1 class="counter">{{ $totalKategori }}</h1>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- TENTANG -->
<div class="container mt-5">

    <div class="card feature-card shadow">

        <div class="card-body p-4">

            <h3>
                Library Management System
            </h3>

            <hr>

            <p>

                Library Management System merupakan
                sistem perpustakaan digital yang
                menyediakan berbagai koleksi buku
                keislaman, fiksi, dan sains teknologi.

                Pengguna dapat mencari buku,
                melihat detail buku, serta melakukan
                peminjaman secara online dengan
                lebih mudah dan cepat.

            </p>

        </div>

    </div>

</div>

<!-- VIDEO -->
 <div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-body">

            <h2 class="text-center mb-4">
                🎥 Virtual Tour Perpustakaan
            </h2>

            <div class="ratio ratio-16x9">

                <video controls
                       poster="{{ asset('storage/Hero/poster.jpeg') }}">

                    <source
                    src="{{ asset('storage/video/tour.mp4') }}"
                    type="video/mp4">

                </video>

            </div>

        </div>

    </div>

</div>

<!-- FITUR -->
<div class="container mt-5 mb-5">

    <h2 class="text-center mb-4">
        Fitur Utama
    </h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card feature-card shadow">

                <div class="card-body text-center">

                    <h1>🔍</h1>

                    <h5>Cari Buku</h5>

                    <p>
                        Temukan buku dengan cepat
                        melalui katalog digital.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card feature-card shadow">

                <div class="card-body text-center">

                    <h1>📖</h1>

                    <h5>Pinjam Buku</h5>

                    <p>
                        Lakukan peminjaman buku
                        secara online.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card feature-card shadow">

                <div class="card-body text-center">

                    <h1>📊</h1>

                    <h5>Riwayat</h5>

                    <p>
                        Pantau seluruh aktivitas
                        peminjaman buku.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="container mb-5">

    <div class="card border-0 shadow-lg text-center p-5">

        <h2>Mulai Jelajahi Ribuan Buku</h2>

        <p>
            Temukan koleksi terbaik untuk menambah wawasan dan pengetahuan Anda.
        </p>

        <a href="/login"
           class="btn btn-success btn-lg">
           Mulai Sekarang
        </a>

    </div>

</div>
<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">

    © 2026 Library Management System

</footer>
<script>

document.querySelectorAll('.counter').forEach(counter => {

    let target = parseInt(counter.innerText);

    let count = 0;

    let interval = setInterval(() => {

        count += Math.ceil(target / 50);

        if(count >= target){
            count = target;
            clearInterval(interval);
        }

        counter.innerText = count;

    }, 20);

});

</script>

<script src="{{ asset('/css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>