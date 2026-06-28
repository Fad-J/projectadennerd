@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">

    <style>

body{
    background:
    linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #334155);

    min-height:100vh;
}

/* HEADER */
.dashboard-header{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997,
    #0ea5e9);

    background-size:300% 300%;

    animation:gradientMove 8s ease infinite;

    color:white;

    padding:40px;

    border-radius:0 0 30px 30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.2);
}

@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* CARD */
.card{

    border:none;

    border-radius:20px;

    overflow:hidden;

    transition:.4s;

    box-shadow:
    0 10px 25px rgba(0,0,0,.15);
}

.card:hover{

    transform:
    translateY(-8px);

    box-shadow:
    0 15px 35px rgba(0,0,0,.25);
}

/* STAT CARD */
.stat-card{

    background:
    linear-gradient(
    135deg,
    #ffffff,
    #f8fafc);
}

/* MENU CARD */
.menu-card{

    background:
    rgba(255,255,255,.95);

    backdrop-filter:blur(15px);
}

/* BUKU CARD */
.book-card{

    overflow:hidden;
}

.book-card img{

    transition:.5s;
}

.book-card:hover img{

    transform:scale(1.08);
}

/* BUTTON */
.btn{

    border-radius:12px;

    font-weight:600;

    transition:.3s;
}

.btn:hover{

    transform:translateY(-2px);
}

/* JUDUL */
.section-title{

    color:white;

    font-weight:bold;
}

/* ANIMASI */
.fade-up{

    animation:
    fadeUp .8s ease;
}

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(30px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

</style>
</head>
<body>

<!-- HEADER -->
<div class="dashboard-header">

    <h1>📚 Library Management System</h1>

    <p>
        Sistem Peminjaman Buku Online
    </p>

</div>

<div class="container mt-4">

    <div class="row">

        <div class="col-md-8">

            <h2 class="fw-bold text-white">
                👋 Selamat Datang,
                {{ session()->get('username') }}
            </h2>

            <p class="text-light fs-5">
                Jelajahi koleksi buku digital,
                lakukan peminjaman, dan pantau
                riwayat aktivitas Anda.
            </p>

        </div>

        <div class="col-md-4 text-end">

            <a href="/logout"
               class="btn btn-danger">
                Logout
            </a>

        </div>

    </div>

    <hr>

    <div class="row mb-4">

    <div class="col-md-6">

        <div class="card stat-card fade-up">

            <div class="card-body text-center">

                <h5>📚 Total Buku</h5>

                <h1>{{ $totalBuku }}</h1>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5>📖 Buku Yang Dipinjam</h5>

                <h1>{{ $bukuSaya }}</h1>

            </div>

        </div>

    </div>

</div>

<div class="alert alert-info shadow-sm mt-4">

    🔥 Buku paling banyak dipinjam minggu ini:
    <strong>
        {{ $bukuTerbaru->first()->NamaBuku ?? '-' }}
    </strong>

</div>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h5>Katalog Buku</h5>

                    <p>
                        Lihat seluruh koleksi buku
                    </p>

                    <a href="/katalog"
                       class="btn btn-primary">

                        Lihat Katalog

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card menu-card fade-up">

                <div class="card-body text-center">

                    <h5>Riwayat Peminjaman</h5>

                    <p>
                        Lihat daftar buku yang pernah dipinjam
                    </p>

                    <a href="/riwayat"
                       class="btn btn-warning">

                        Lihat Riwayat

                    </a>

                </div>

            </div>

        </div>

    </div>
    <hr class="mt-5">

<h2 class="section-title mb-4">
    ✨ Koleksi Buku Terbaru
</h2>

<div class="row">

    @foreach($bukuTerbaru as $b)

    <div class="col-md-4 mb-4">

        <div class="card book-card h-100">

            <img src="{{ Storage::url($b->Image) }}"
                 class="card-img-top"
                 style="height:250px; object-fit:cover;">

                <div class="card-body">

                    <h5 class="fw-bold">
                        {{ $b->NamaBuku }}
                    </h5>

                    <p class="text-muted">
                        ✍ {{ $b->NamaPengarang }}
                    </p>

                    <span class="badge bg-success">
                        {{ $b->Kategori }}
                    </span>

                </div>

        </div>

    </div>

    @endforeach

</div>
</div>

<footer
class="text-center text-white mt-5 p-4">

    <hr class="text-light">

    <h5>
        📚 Library Management System
    </h5>

    <small>
        Sistem Peminjaman Buku Digital
        Modern © 2026
    </small>

</footer>

</body>
</html>