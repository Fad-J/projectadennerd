<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
    <script src="{{ asset('/css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-4.0.0.min (1).js') }}"></script>
    <style>

body{
    background:#f4f6f9;
}

.header-dashboard{
    background:
    linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #0f766e,
    #20c997);
    background-size:300% 300%;
    animation:headerMove 10s ease infinite;
    color:white;
    padding:40px;
    border-radius:0 0 30px 30px;
}

@keyframes headerMove{

    0%{
        background-position:0% 50%;
    }

    50%{
        background-position:100% 50%;
    }

    100%{
        background-position:0% 50%;
    }

}

.card{
    border:none;
    border-radius:18px;
}

.stat-card{
    overflow:hidden;
    position:relative;
    transition:.4s;
}

.stat-card::before{
    content:'';
    position:absolute;
    width:150%;
    height:150%;
    background:
    linear-gradient(
    135deg,
    transparent,
    rgba(255,255,255,.25),
    transparent);
    top:-100%;
    left:-100%;
    transition:.6s;
}

.stat-card:hover::before{
    top:100%;
    left:100%;
}

.stat-card:hover{
    transform:translateY(-10px);
    box-shadow:
    0 20px 40px rgba(0,0,0,.15);
}

.search-box{
    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:
    0 15px 35px rgba(0,0,0,.08);
}

.search-box h3{
    color:#198754;
}

.form-control-lg{
    border-radius:15px;
}

.form-control-lg:focus{
    box-shadow:
    0 0 20px rgba(32,201,151,.35);
    border-color:#20c997;
}

.table-box{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:
    0 10px 25px rgba(0,0,0,.08);
}

.btn{
    border-radius:10px;
}

.form-control{
    border-radius:15px;
}

.form-control:focus{
    transform:scale(1.02);
    box-shadow:
    0 0 15px rgba(32,201,151,.4);
}

.modal-content{
    border:none;
    border-radius:25px;
    overflow:hidden;
}

.modal-header{
    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);
    color:white;
}

.modal-title{
    font-weight:bold;
}

.modal-body{
    background:#f8fafc;
}

.modal-footer{
    background:#f8fafc;
}

.modern-table{
    background:white;
    border-radius:20px;
    overflow:hidden;
}

.modern-table thead{
    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);
    color:white;
}

.modern-table thead th{
    border:none;
    padding:18px;
    font-size:15px;
    font-weight:600;
}

.modern-table tbody td{
    padding:18px;
    vertical-align:middle;
}

.modern-table tbody tr{
    transition:.35s;
}

.modern-table tbody tr:hover{
    background:#f8fffd;
    transform:scale(1.01);
    box-shadow:
    0 8px 25px rgba(0,0,0,.08);
}

.book-cover{
    width:90px;
    height:120px;
    object-fit:cover;
    border-radius:15px;
    box-shadow:
    0 8px 20px rgba(0,0,0,.15);
    transition:.3s;
}

.book-cover:hover{
    transform:scale(1.08);
}

.stok-badge{
    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);
    color:white;
    padding:8px 15px;
    border-radius:20px;
    font-weight:bold;
}

.btn-edit{
    background:
    linear-gradient(
    135deg,
    #f59e0b,
    #f97316);
    color:white;
    border:none;
    border-radius:10px;
    padding:8px 15px;
    text-decoration:none;
}

.btn-delete{
    background:
    linear-gradient(
    135deg,
    #dc2626,
    #ef4444);
    color:white;
    border:none;
    border-radius:10px;
    padding:8px 15px;
    text-decoration:none;
}

.btn-edit:hover,
.btn-delete:hover{
    transform:translateY(-2px);
    color:white;
}

.table-responsive{
    border-radius:20px;
    box-shadow:
    0 15px 35px rgba(0,0,0,.08);
}

</style>
    <script type="text/javascript">

    function lihatpustaka(){
        $.ajax({
            type:"GET",
            url:"/tabel"
        }).done(function(data){
            $('#tabel').html(data);
        });
    }

    function caripustaka(){
        var idbuku = document.getElementById("idbuku").value;

        $.ajax({
            type:"GET",
            url:"/cari/"+idbuku
        }).done(function(data){
            $('#tabel').html(data);
            alert("Data ditemukan!");
        });
    }

    </script>

</head>

<body onload="lihatpustaka();">

<!-- HEADER -->
<div class="header-dashboard shadow">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h1 class="fw-bold">
                    📚 Library Management System
                </h1>

                <p class="fs-5 mb-1">
                    Selamat Datang Administrator 👋
                </p>

                <small>
                    Kelola buku, pengguna, dan peminjaman dengan mudah.
                </small>

            </div>

            <div class="col-md-4 text-end">

                <a href="/admin/peminjaman"
                   class="btn btn-warning me-2">

                    📖 Peminjaman

                </a>

                <a href="/logout"
                   class="btn btn-danger">

                    Logout

                </a>

            </div>

        </div>

    </div>

</div>

<div class="container mt-4">

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow">

                <div class="card-body text-center">

                    <div class="display-5">📚</div>

                    <h6 class="text-muted">
                        Total Buku
                    </h6>

                    <h1 class="counter text-success fw-bold">
                        {{ $totalBuku }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow">

                <div class="card-body text-center">

                    <div class="display-5">👤</div>

                    <h6 class="text-muted">
                        Total User
                    </h6>

                    <h1 class="counter text-primary fw-bold">
                        {{ $totalUser }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card shadow">

                <div class="card-body text-center">

                    <div class="display-5">📖</div>

                    <h6 class="text-muted">
                        Sedang Dipinjam
                    </h6>

                    <h1 class="counter text-warning fw-bold">
                        {{ $sedangPinjam }}
                    </h1>

                </div>

            </div>

        </div>

    </div>

</div>

<hr>
<div class="search-box shadow mb-4">
<h3 class="fw-bold mb-3">
    📚 Data Perpustakaan
</h3>

<p class="text-muted">
    Cari buku berdasarkan ID Buku
</p>

<div class="row g-3 align-items-center">

    <div class="col-md-6">

        <input type="text"
               id="idbuku"
               class="form-control form-control-lg"
               placeholder="🔍 Masukkan ID Buku">

    </div>

    <div class="col-auto">

        <button type="button"
                id="cari"
                class="btn btn-success btn-lg"
                onclick="caripustaka();">

            🔍 Search

        </button>

    </div>

    <div class="col-auto">

        <button type="button"
                id="lihat"
                class="btn btn-danger btn-lg"
                onclick="lihatpustaka();">

            📚 Lihat Semua

        </button>

    </div>

</div>

            @if(session()->get('status') == 'admin')
            <td class="ps-3">
                <button type="button"
                        class="btn btn-info"
                        data-bs-toggle="modal"
                        data-bs-target="#ModalInsert">
                    ➕ Tambah Buku
                </button>
</div>
            </td>
            @endif

        </tr>
    </table>

    <br>

    <div class="table-box shadow">

    <div id="tabel">

    </div>

</div>

</div>

<!-- MODAL TAMBAH BUKU -->
<div class="modal" id="ModalInsert">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="/tambah"
                  method="post"
                  enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">
                        Pendaftaran Buku Baru
                    </h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

               <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                📚 ID Buku
                            </label>

                            <input type="text"
                                name="idbuku"
                                class="form-control"
                                placeholder="Masukkan ID Buku">

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                📖 Judul Buku
                            </label>

                            <input type="text"
                                name="NamaBuku"
                                class="form-control"
                                placeholder="Masukkan Judul Buku">

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                ✍️ Nama Pengarang
                            </label>

                            <input type="text"
                                name="NamaPengarang"
                                class="form-control"
                                placeholder="Masukkan Nama Pengarang">

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                📦 Quantity
                            </label>

                            <input type="number"
                                name="qty"
                                min="1"
                                max="100"
                                class="form-control"
                                placeholder="Jumlah Buku">

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                🏷️ Kategori
                            </label>

                            <select name="Kategori"
                                    class="form-select">

                                <option value="">-- Pilih Kategori --</option>

                                <option value="Keislaman">
                                    Keislaman
                                </option>

                                <option value="Fiksi">
                                    Fiksi
                                </option>

                                <option value="Saintek">
                                    Saintek
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                🖼️ Upload Cover Buku
                            </label>

                            <input type="file"
                                name="file"
                                class="form-control">

                            <small class="text-muted">
                                Format yang disarankan: JPG, PNG, JPEG
                            </small>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            ❌ Batal
                        </button>

                        <button type="submit"
                                class="btn btn-success">
                            💾 Simpan Buku
                        </button>

                    </div>

            </form>

        </div>

    </div>

</div>


</body>
</html>