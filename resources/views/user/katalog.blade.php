<!DOCTYPE html>
<html>
<head>
    <title>Katalog Buku</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
    <script type="text/javascript"src="{{ asset('/js/jquery-4.0.0.min (1).js') }}"></script>
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

/* HERO */
.hero{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997,
    #0ea5e9);

    background-size:300% 300%;

    animation:gradientMove 10s ease infinite;

    padding:60px 30px;

    border-radius:0 0 30px 30px;

    color:white;

    text-align:center;

    margin-bottom:40px;
}

@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* SEARCH */
.search-box{

    background:white;

    padding:20px;

    border-radius:20px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.15);
}

/* CARD */
.book-card{

    border:none;

    border-radius:20px;

    overflow:hidden;

    background:
    rgba(255,255,255,.95);

    transition:.4s;

    box-shadow:
    0 10px 25px rgba(0,0,0,.15);
}

.book-card:hover{

    transform:
    translateY(-10px);

    box-shadow:
    0 20px 40px rgba(0,0,0,.25);
}

/* COVER */
.book-card img{

    height:320px;

    object-fit:cover;

    transition:.5s;
}

.book-card:hover img{

    transform:scale(1.08);
}

/* TITLE */
.book-title{

    font-weight:700;

    min-height:55px;
}

/* AUTHOR */
.book-author{

    color:#6c757d;
}

/* BUTTON */
.btn-detail{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);

    border:none;

    color:white;

    border-radius:12px;

    font-weight:600;
}

.btn-detail:hover{

    color:white;

    transform:translateY(-2px);
}

/* SEARCH BUTTON */
.btn-search{

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #4f46e5);

    border:none;
}

/* BADGE */
.badge{

    font-size:.85rem;
}

/* ANIMATION */
.card-buku{

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

.collection-mini{

    background:
    rgba(255,255,255,.1);

    backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:18px;

    padding:15px 20px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:15px;

    color:white;

    transition:.3s;

    box-shadow:
    0 8px 20px rgba(0,0,0,.15);
}

.collection-mini:hover{

    transform:translateY(-3px);

    box-shadow:
    0 12px 25px rgba(0,0,0,.25);
}

.btn-back{

    background:rgba(255,255,255,.15);

    backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,.2);

    color:white;

    border-radius:12px;

    padding:10px 20px;

    transition:.3s;
}

.btn-back:hover{

    color:white;

    transform:translateX(-5px);

    background:rgba(255,255,255,.25);
}

</style>
</head>
<body>

<div class="hero">

    <h1 class="display-4 fw-bold">
        📚 Katalog Buku Digital
    </h1>

    <p class="lead">

        Jelajahi ribuan koleksi buku
        dan temukan bacaan favorit Anda.

    </p>

</div>

<div class="container mt-4">

    <a href="/user"
       class="btn btn-back mb-3">

        ← Kembali

    </a>

    <div class="search-box mb-4">

<div class="container mt-4">

    <div class="search-box mb-4">

    <div class="row">

</div>

<div class="row mb-4 align-items-center">

    <div class="col-md-8">

        <input type="text"
            id="cari"
            class="form-control"
            placeholder="Cari judul buku..."
            onkeyup="cariBuku()">

    </div>

    <div class="col-md-2">

        <button class="btn btn-search text-white w-100"
                onclick="cariBuku()">
            Cari
        </button>

    </div>

    <div class="col-md-2">

        <div class="badge bg-success w-100 p-3 fs-6">

            📚 {{ count($books) }}

        </div>

    </div>

</div>

    <div class="row" id="hasilBuku">

        @foreach($books as $b)

        <div class="col-md-3 mb-4 card-buku" data-judul="{{ $b->NamaBuku }}">

            <div class="card book-card h-100">

                <img src="{{ Storage::url($b->Image) }}"
                     class="card-img-top">

                <div class="card-body d-flex flex-column">

                    <h5 class="book-title">
                        {{ $b->NamaBuku }}
                    </h5>

                    <p class="book-author">
                        ✍ {{ $b->NamaPengarang }}
                    </p>

                    <p>

                        @if($b->Kategori == 'Keislaman')
                            <span class="badge bg-success">
                                🕌 Keislaman
                            </span>
                        @elseif($b->Kategori == 'Fiksi')
                            <span class="badge bg-primary">
                                📖 Fiksi
                            </span>
                        @else
                            <span class="badge bg-warning text-dark">
                                🔬 Saintek
                            </span>
                        @endif

                    </p>

                    <div class="mt-auto">

                        <a href="/detail/{{ $b->idbuku }}"
                        class="btn btn-detail w-100">

                            Detail Buku

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach
    </div>
    </div>
    </div>

</div>

<footer
class="text-center text-white mt-5 p-4">

    <hr>

    <h5>
        📚 Library Management System
    </h5>

    <small>

        Sistem Katalog Buku Digital Modern
        © 2026

    </small>

</footer>

<script>

function cariBuku()
{
    let keyword = $('#cari').val();

    $.ajax({

        url:'/search-buku',

        type:'GET',

        data:{
            keyword:keyword
        },

        success:function(data)
        {
            $('#hasilBuku').html('');

            data.forEach(function(book){

                let kategori='';

                if(book.Kategori=='Keislaman')
                {
                    kategori=
                    '<span class="badge bg-success">🕌 Keislaman</span>';
                }
                else if(book.Kategori=='Fiksi')
                {
                    kategori=
                    '<span class="badge bg-primary">📖 Fiksi</span>';
                }
                else
                {
                    kategori=
                    '<span class="badge bg-warning text-dark">🔬 Saintek</span>';
                }

                $('#hasilBuku').append(`
                <div class="col-md-3 mb-4">

                    <div class="card book-card h-100">

                        <img src="/storage/${book.Image}"
                             class="card-img-top">

                        <div class="card-body d-flex flex-column">

                            <h5>${book.NamaBuku}</h5>

                            <p>
                                ✍ ${book.NamaPengarang}
                            </p>

                            ${kategori}

                            <div class="mt-auto">

                                <a href="/detail/${book.idbuku}"
                                   class="btn btn-detail w-100">

                                    Detail Buku

                                </a>

                            </div>

                        </div>

                    </div>

                </div>
                `);

            });

        }

    });
}

$('#cari').keyup(function(){

    cariBuku();

});
</script>

</body>
</html>