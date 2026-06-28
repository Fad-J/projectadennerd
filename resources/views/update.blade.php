<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
    <title>Edit Buku</title>
<style>

body{

    background:
    linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #334155);

    min-height:100vh;

    padding-bottom:50px;
}

.welcome-card{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);

    color:white;

    border-radius:20px;

    padding:25px;

    margin-top:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.2);
}

.edit-card{

    border:none;

    border-radius:25px;

    overflow:hidden;

    backdrop-filter:blur(15px);

    box-shadow:
    0 15px 35px rgba(0,0,0,.2);
}

.edit-header{

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #4f46e5);

    color:white;
}

.book-cover{

    height:320px;
    width:230px;

    object-fit:cover;

    border-radius:20px;

    transition:.4s;

    box-shadow:
    0 10px 25px rgba(0,0,0,.2);
}

.book-cover:hover{

    transform:
    scale(1.05)
    rotate(-2deg);
}

.form-control,
.form-select{

    border-radius:12px;
}

.form-control:focus,
.form-select:focus{

    border-color:#20c997;

    box-shadow:
    0 0 15px rgba(32,201,151,.25);
}

.btn-save{

    background:
    linear-gradient(
    135deg,
    #198754,
    #20c997);

    color:white;

    border:none;

    border-radius:12px;

    padding:10px 20px;
}

.btn-save:hover{

    color:white;

    transform:translateY(-2px);
}

.btn-back{

    border-radius:12px;
}
</style>
</head>

<body>

    
    <div class="container">

    <div class="welcome-card">

        <h2 class="fw-bold mb-1">

            👋 Selamat Datang,
            {{ session()->get('username') }}

        </h2>

        <p class="mb-0">

            Kelola dan perbarui data buku.

        </p>

    </div>

</div>
   

<div class="container mt-5">
@foreach($books as $a)

<div class="card edit-card">

    <div class="card-header edit-header">
        <h3 class="mb-0">📚 Edit Data Buku</h3>
    </div>

    <div class="card-body">

        <form action="/edit/{{ $a->idbuku }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-4 text-center">

                    <h5 class="mb-3">Cover Saat Ini</h5>

                   <img src="{{ Storage::url($a->Image) }}" class="book-cover">

                </div>

                <div class="col-md-8">

                    <input type="hidden"
                           name="idbuku"
                           value="{{ $a->idbuku }}">

                    <div class="mb-3">
                        <label class="form-label fw-bold">ID Buku</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $a->idbuku }}"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Buku</label>
                        <input type="text"
                               name="NamaBuku"
                               class="form-control"
                               value="{{ $a->NamaBuku }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pengarang</label>
                        <input type="text"
                               name="NamaPengarang"
                               class="form-control"
                               value="{{ $a->NamaPengarang }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Jumlah Buku</label>
                        <input type="number"
                               name="qty"
                               min="1"
                               max="100"
                               class="form-control"
                               value="{{ $a->qty }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>

                        <select name="Kategori" class="form-select">

                            <option value="Keislaman"
                            {{ $a->Kategori == 'Keislaman' ? 'selected' : '' }}>
                                Keislaman
                            </option>

                            <option value="Fiksi"
                            {{ $a->Kategori == 'Fiksi' ? 'selected' : '' }}>
                                Fiksi
                            </option>

                            <option value="Saintek"
                            {{ $a->Kategori == 'Saintek' ? 'selected' : '' }}>
                                Saintek
                            </option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Ganti Cover
                        </label>

                        <input type="file"
                               name="file"
                               class="form-control">
                    </div>

                    <div class="mt-3">

                        <span class="badge bg-success fs-6">
                            {{ $a->Kategori }}
                        </span>

                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit"
                            class="btn btn-save">
                            💾 Simpan Perubahan
                        </button>

                        <a href="/admin" class="btn btn-secondary btn-back">
                            ↩ Kembali
                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

@endforeach

</div>

</body>
</html>
