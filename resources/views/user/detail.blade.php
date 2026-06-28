<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
<style>

body{
    background:linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #334155);

    min-height:100vh;
}

/* HEADER */
.hero{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997,
    #0ea5e9);

    background-size:300% 300%;

    animation:gradientMove 10s ease infinite;

    color:white;

    padding:50px;

    text-align:center;

    border-radius:0 0 30px 30px;

    margin-bottom:50px;
}

@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* CARD */
.detail-card{

    background:
    rgba(255,255,255,.95);

    border:none;

    border-radius:30px;

    overflow:hidden;

    box-shadow:
    0 20px 50px rgba(0,0,0,.25);

    animation:fadeUp .8s ease;
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

/* COVER */
.book-cover{

    border-radius:20px;

    transition:.5s;

    box-shadow:
    0 15px 30px rgba(0,0,0,.25);
}

.book-cover:hover{

    transform:
    scale(1.04)
    rotate(-1deg);
}

/* TITLE */
.book-title{

    font-size:2.3rem;

    font-weight:800;

    color:#0f172a;
}

/* INFO BOX */
.info-box{

    background:#f8fafc;

    padding:15px 20px;

    border-radius:15px;

    margin-bottom:12px;

    border-left:5px solid #20c997;
}

/* BUTTON */
.btn-back{

    background:
    linear-gradient(
    135deg,
    #475569,
    #334155);

    border:none;

    color:white;

    border-radius:12px;

    padding:10px 20px;
}

.btn-back:hover{

    color:white;

    transform:translateX(-3px);
}

.btn-pinjam{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);

    border:none;

    color:white;

    border-radius:12px;

    padding:10px 20px;

    font-weight:600;
}

.btn-pinjam:hover{

    color:white;

    transform:translateY(-2px);
}

/* STOK */
.stock{

    font-size:1.1rem;

    font-weight:700;

    color:#198754;
}

</style>
</head>
<body>

<div class="hero">

    <h1 class="display-5 fw-bold">
        📚 Detail Buku
    </h1>

    <p class="lead mb-0">
        Informasi lengkap koleksi perpustakaan
    </p>

</div>

<div class="container mt-5">

    <div class="card detail-card">
        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    <img src="{{ Storage::url($book->Image) }}"
                         class="img-fluid book-cover"
                         style="max-height:500px;">

                </div>

                <div class="col-md-8">

                    <h2 class="book-title mb-4">
                        {{ $book->NamaBuku }}
                    </h2>

                    <hr>

                    <div class="info-box">
                        <strong>🆔 ID Buku</strong><br>
                        {{ $book->idbuku }}
                    </div>

                    <div class="info-box">
                        <strong>✍ Pengarang</strong><br>
                        {{ $book->NamaPengarang }}
                    </div>

                    <div class="info-box">
                        <strong>🏷 Kategori</strong><br>

                        <span class="badge bg-success">
                            {{ $book->Kategori }}
                        </span>
                    </div>

                    <div class="info-box">
                        <strong>📦 Stok Tersedia</strong><br>

                        <span class="stock">
                            {{ $book->qty }} Buku
                        </span>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="mt-4 d-flex gap-2">

                        <a href="/katalog"
                            class="btn btn-back">
                            Kembali
                        </a>

                        <form action="/pinjam/{{ $book->idbuku }}"
                              method="POST">

                            {{ csrf_field() }}

                            <button type="submit"
                                    class="btn btn-pinjam">
                                📚 Pinjam Buku
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>