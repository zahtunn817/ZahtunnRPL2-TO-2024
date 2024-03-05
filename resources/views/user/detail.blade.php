@extends('templates.layout')
@push('style')
@endpush
@section('content')
    @include('user.form')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
        </div>
        <div class="card-body">
            @include('templates.alert')
            @foreach ($petugas as $item)
            <div class="row">
                <div class="col-xl-4 col-lg-5 mr-3 mb-3">
                    <img class="img-profile rounded-circle" src="{{ $item->jk == 'L' ? asset('img/l.jpg') : asset('img/p.jpg') }}" style="max-width: 100%;, height: auto; display: block">
                </div>
                <div class="col-xl-7 col-lg-6">
                    <h4>Biodata</h4>
                    <p>Nama: {{ $item->nama }}</p>
                    <p>Jenis kelamin: {{ $item->jk == 'P' ? 'Perempuan' : 'Laki-laki' }}</p>
                    <p>Tanggal lahir: {{ $item->tgl_lahir }}</p>
                    <p>Nomor Telepon: {{ $item->nomor_telepon }}</p>
                    <p>Alamat: {{ $item->alamat }}</p>
                    <h4>Akses</h4>
                    <p>Email: {{ $item->email }}</p>
                    <p>Hak akses: {{ $item->roles == 'masterkey' ? 'admin' : $item->roles }}</p>
                    <button type="button" class="btn btn-warning btn-icon-split mb-3 mr-3" data-toggle="modal" data-target="#user"
                    data-mode="edit" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-jk="{{ $item->jk }}" data-tgl_lahir="{{ $item->tgl_lahir }}" data-email="{{ $item->email }}" data-nomor_telepon="{{ $item->nomor_telepon }}" data-alamat="{{ $item->alamat }}" data-image="{{ $item->image }}" data-roles="{{ $item->roles }}">
                        <span class="icon text-white-50">
                            <i class="fas fa-pen"></i>
                        </span>
                        <span class="text">Ubah data</span>
                    </button>
                    <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                        class="d-inline form-delete" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-icon-split mb-3 delete-data"
                        data-nama="{{ $item->nama }}">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus data</span>
                        </button>
                    </form>
                </div>
            </div>
                @endforeach
         </div>
    </div>
@endsection
@push('script')
    <script>
        console.log('user')
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama}</b></span> akan dihapus?`,
                text: 'Data tidak bisa dikembalikan!',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'd33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#user').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            const nama = btn.data('nama')
            const jk = btn.data('jk')
            const tgl_lahir = btn.data('tgl_lahir')
            const email = btn.data('email')
            const nomor_telepon = btn.data('nomor_telepon')
            const alamat = btn.data('alamat')
            const image = btn.data('image')
            const roles = btn.data('roles')
            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit user')
                modal.find('#nama').val(nama)
                modal.find('#jk').val(jk)
                modal.find('#tgl_lahir').val(tgl_lahir)
                modal.find('#email').val(email)
                modal.find('#nomor_telepon').val(nomor_telepon)
                modal.find('#alamat').val(alamat)
                modal.find('#image').val(image)
                modal.find('#roles').val(roles)
                modal.find('.modal-body form').attr('action', '{{ url('user') }}/' + id)
                modal.find('#method').html('@method("PATCH")')
            } else {
                modal.find('.modal-title').text('Input user')
                modal.find('#nama').val('')
                modal.find('#jk').val('')
                modal.find('#tgl_lahir').val('')
                modal.find('#email').val('')
                modal.find('#nomor_telepon').val('')
                modal.find('#alamat').val('')
                modal.find('#image').val('')
                modal.find('#roles').val('')
                modal.find('.modal-body form').attr('action', '{{ url('user') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
