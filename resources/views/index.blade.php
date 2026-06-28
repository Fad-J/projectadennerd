<div class="row mb-3">

    <div class="col-md-6">

        <input type="text"
               id="cariAdmin"
               class="form-control"
               placeholder="Cari Judul Buku..."
               onkeyup="cariBukuAdmin()">

    </div>

</div>

<div class="table-responsive">

<table class="table modern-table align-middle">

    <thead>

        <tr>

            <th>No</th>
            <th>Cover</th>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Kategori</th>
            <th>Stok</th>

            @if(session()->get('status') == 'admin')
            <th width="180">
                Aksi
            </th>
            @endif

        </tr>

    </thead>

    <tbody id="hasilAdmin">

        @php $no = 1; @endphp

        @foreach($books as $b)

        <tr>

            <td>
                <span class="fw-bold">
                    {{ $no++ }}
                </span>
            </td>

            <td>

                <img src="{{ Storage::url($b->Image) }}"
                     class="book-cover">

            </td>

            <td>

                <span class="badge bg-dark">
                    {{ $b->idbuku }}
                </span>

            </td>

            <td>

                <div class="fw-bold text-dark">
                    {{ $b->NamaBuku }}
                </div>

            </td>

            <td>

                {{ $b->NamaPengarang }}

            </td>

            <td>

                @if($b->Kategori == 'Keislaman')

                    <span class="badge bg-success">
                        📖 Keislaman
                    </span>

                @elseif($b->Kategori == 'Fiksi')

                    <span class="badge bg-primary">
                        📚 Fiksi
                    </span>

                @else

                    <span class="badge bg-warning text-dark">
                        🔬 Saintek
                    </span>

                @endif

            </td>

            <td>

                <span class="stok-badge">
                    {{ $b->qty }}
                </span>

            </td>

            @if(session()->get('status') == 'admin')

            <td>

                <a href="/show/{{ $b->idbuku }}"
                   class="btn btn-edit">

                    ✏ Edit

                </a>

                <a href="/hapus/{{ $b->idbuku }}"
                   onclick="return confirm('Yakin hapus buku ini?')"
                   class="btn btn-delete">

                    🗑 Hapus

                </a>

            </td>

            @endif

        </tr>

        @endforeach

    </tbody>

</table>

</div>

<script>

function cariBukuAdmin()
{
    let keyword = $('#cariAdmin').val();

    $.ajax({

        url:'/search-admin',

        type:'GET',

        data:{
            keyword:keyword
        },

        success:function(data)
        {
            $('#hasilAdmin').html('');

            let no = 1;

            data.forEach(function(book){

                $('#hasilAdmin').append(`

                <tr>

                    <td>${no++}</td>

                    <td>
                        <img src="/storage/${book.Image}"
                             width="70">
                    </td>

                    <td>${book.idbuku}</td>

                    <td>${book.NamaBuku}</td>

                    <td>${book.NamaPengarang}</td>

                    <td>${book.Kategori}</td>

                    <td>${book.qty}</td>

                    <td>

                        <a href="/show/${book.idbuku}"
                           class="btn btn-edit">

                           Edit

                        </a>

                        <a href="/hapus/${book.idbuku}"
                           class="btn btn-delete">

                           Hapus

                        </a>

                    </td>

                </tr>

                `);

            });

        }

    });
}

</script>