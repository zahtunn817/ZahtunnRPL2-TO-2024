@extends('templates.layout')
@push('style')
@endpush
@section('content')
    @include('pelanggan.form')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
        </div>
        <div class="card-body">
            @include('templates.alert')
            <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#pelanggan">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah pelanggan</span>
            </a>
            @include('pelanggan.data')
        </div>
    </div>
@endsection
@push('script')
    <script>
        console.log('pelanggan')
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_pelanggan = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama_pelanggan}</b></span> akan dihapus?`,
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

        $('#pelanggan').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            const nama_pelanggan = btn.data('nama_pelanggan')
            const email = btn.data('email')
            const nomor_telepon = btn.data('nomor_telepon')
            const alamat = btn.data('alamat')
            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit pelanggan')
                modal.find('#nama_pelanggan').val(nama_pelanggan)
                modal.find('#email').val(email)
                modal.find('#nomor_telepon').val(nomor_telepon)
                modal.find('#alamat').val(alamat)
                modal.find('.modal-body form').attr('action', '{{ url('pelanggan') }}/' + id)
                modal.find('#method').html('@method("PATCH")')
            } else {
                modal.find('.modal-title').text('Input pelanggan')
                modal.find('#nama_pelanggan').val('')
                modal.find('#email').val('')
                modal.find('#nomor_telepon').val('')
                modal.find('#alamat').val('')
                modal.find('.modal-body form').attr('action', '{{ url('pelanggan') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
