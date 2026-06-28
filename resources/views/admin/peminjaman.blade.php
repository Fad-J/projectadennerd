<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>

    <link rel="stylesheet"href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
    <script src="{{ asset('/css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-4.0.0.min (1).js') }}"></script>
    <style>
        body{
                background:#f4f6f9;
            }

            .borrow-header{
                background:
                linear-gradient(
                135deg,
                #198754,
                #20c997);
                color:white;
                padding:30px;
                border-radius:0 0 25px 25px;
                box-shadow:
                0 10px 25px rgba(0,0,0,.1);
            }

            .card{
                border-radius:20px;
            }

            .modern-table{
                margin-bottom:0;
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
            }

            .modern-table tbody td{
                padding:18px;
                vertical-align:middle;
            }

            .modern-table tbody tr{
                transition:.3s;
            }

            .modern-table tbody tr:hover{
                background:#f8fffd;
                transform:scale(1.01);
            }

            .btn-kembali{
                background:
                linear-gradient(
                135deg,
                #198754,
                #20c997);
                color:white;
                border:none;
                border-radius:10px;
                padding:8px 15px;
                text-decoration:none;
                transition:.3s;
            }

            .btn-kembali:hover{
                color:white;
                transform:translateY(-2px);
                box-shadow:
                0 8px 20px rgba(32,201,151,.3);
            }

            .badge{
                padding:8px 12px;
                font-size:13px;
            }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="borrow-header">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h1 class="fw-bold mb-0">
                    📖 Data Peminjaman
                </h1>

                <p class="mb-0">
                    Kelola seluruh transaksi peminjaman buku
                </p>

            </div>

            <a href="/admin"
               class="btn btn-light">

                ⬅ Kembali Dashboard

            </a>

        </div>

    </div>

</div>

<div class="container mt-4">

    <!-- STATISTIK -->
    <div class="row mb-4">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <div class="display-5">
                        📚
                    </div>

                    <h5>
                        Total Peminjaman
                    </h5>

                    <h1 class="text-primary fw-bold">
                        {{ count($data) }}
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <div class="display-5">
                        ⏳
                    </div>

                    <h5>
                        Sedang Dipinjam
                    </h5>

                    <h1 class="text-warning fw-bold">

                        {{ $data->where('status','Dipinjam')->count() }}

                    </h1>

                </div>

            </div>

        </div>

    </div>

    <!-- TABEL -->
    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table modern-table align-middle">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>👤 User</th>
                            <th>📚 Buku</th>
                            <th>📅 Tanggal Pinjam</th>
                            <th>📌 Status</th>
                            <th>⚙ Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @php $no = 1; @endphp

                        @foreach($data as $d)

                        <tr>

                            <td>{{ $no++ }}</td>

                            <td>

                                <strong>
                                    {{ $d->username }}
                                </strong>

                            </td>

                            <td>

                                {{ $d->NamaBuku }}

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

                            <td>

                                @if($d->status == 'Dipinjam')

                                <a href="/kembalikan/{{ $d->id }}"
                                   onclick="return confirm('Yakin buku sudah dikembalikan?')"
                                   class="btn btn-kembali">

                                    🔄 Kembalikan

                                </a>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>