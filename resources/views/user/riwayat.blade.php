<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Peminjaman</title>

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
.page-header{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997,
    #0ea5e9);

    background-size:300% 300%;

    animation:gradientMove 10s ease infinite;

    padding:40px;

    border-radius:0 0 25px 25px;

    color:white;

    margin-bottom:30px;
}

@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* CARD */
.stat-card{

    background:
    linear-gradient(
    135deg,
    #10b981,
    #059669);

    border:none;

    border-radius:20px;

    color:white;

    box-shadow:
    0 10px 25px rgba(16,185,129,.35);

    transition:.3s;
}

.stat-card:hover{

    transform:translateY(-5px);
}

/* TABEL */
.table-box{

    background:white;

    border-radius:20px;

    padding:20px;

    overflow:hidden;

    border:1px solid #dee2e6;

    box-shadow:
    0 10px 30px rgba(0,0,0,.2);

    animation:fadeUp .8s ease;
}

.table tbody tr:nth-child(even){

    background:#f8fafc;
}

.table thead tr{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);
}

.table thead th{

    background:
    linear-gradient(
    135deg,
    #10b981,
    #059669);

    color:white !important;

    text-transform:uppercase;

    letter-spacing:1px;

    font-size:14px;

    font-weight:700;

    border-right:1px solid rgba(255,255,255,.2);

    padding:18px;
}

.table tbody td{

    color:#212529 !important;

    font-weight:500;

    border-bottom:1px solid #dee2e6;

    border-right:1px solid #e9ecef;

    padding:18px;
}

.table tbody tr{

    transition:.3s;
}

.table tbody tr:hover{

    background:#e8fff5;

    transform:scale(1.01);
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

/* BUTTON */
.btn-back{

    background:
    linear-gradient(
    135deg,
    #475569,
    #334155);

    color:white;

    border:none;

    border-radius:12px;
}

.btn-back:hover{

    color:white;

    transform:translateX(-3px);
}    

.history-stat{

    background:white;

    border-radius:16px;

    padding:12px 20px;

    display:flex;

    align-items:center;

    gap:15px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.15);

    min-width:180px;
}

.history-icon{

    width:50px;

    height:50px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:12px;

    font-size:24px;

    background:
    linear-gradient(
    135deg,
    #10b981,
    #059669);

    color:white;
}

.history-stat small{

    color:#6c757d;
}

.history-stat h4{

    color:#0f172a;
}

</style>
</head>

<body>
<!-- HEADER -->
<div class="page-header">

    <div class="container">

        <h1 class="fw-bold">
            📖 Riwayat Peminjaman
        </h1>

        <p class="mb-0">
            Lihat seluruh aktivitas peminjaman buku Anda
        </p>

    </div>

</div>

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <a href="/user"
       class="btn btn-back">

        ← Kembali ke Dashboard

    </a>

    <div class="history-stat">

        <div class="history-icon">
            📚
        </div>

        <div>

            <small>
                Total Riwayat
            </small>

            <h4 class="mb-0 fw-bold">
                {{ count($data) }}
            </h4>

        </div>

    </div>

</div>

    <!-- TABEL -->
    <div class="table-box">

        <table class="table align-middle">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @php $no = 1; @endphp

                @foreach($data as $d)

                <tr>

                    <td>{{ $no++ }}</td>

                    <td>
                        📚 {{ $d->NamaBuku }}
                    </td>

                    <td>
                        {{ $d->tanggal_pinjam }}
                    </td>

                    <td>

                        @if($d->status == 'Dipinjam')

                        <span class="badge bg-warning text-dark">
                            📖 Dipinjam
                        </span>

                        @else

                        <span class="badge bg-success">
                            ✅ Dikembalikan
                        </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
</body>
</html>