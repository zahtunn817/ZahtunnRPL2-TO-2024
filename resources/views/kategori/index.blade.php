@extends('templates.layout')
@push('style')
@endpush
@section('content')
    @include('kategori.form')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
        </div>
        <div class="card-body">
            @include('templates.alert')
            <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#kategori">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah kategori</span>
            </a>
            @include('kategori.data')
        </div>
    </div>
@endsection
@push('script')
    <script>
        console.log('kategori')
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_kategori = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama_kategori}</b></span> akan dihapus?`,
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

        $('#kategori').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            const nama_kategori = btn.data('nama_kategori')
            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit kategori')
                modal.find('#nama_kategori').val(nama_kategori)
                modal.find('.modal-body form').attr('action', '{{ url('kategori') }}/' + id)
                modal.find('#method').html('@method("PATCH")')
            } else {
                modal.find('.modal-title').text('Input kategori')
                modal.find('#nama_kategori').val('')
                modal.find('.modal-body form').attr('action', '{{ url('kategori') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
