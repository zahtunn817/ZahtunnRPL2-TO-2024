@extends('templates.layout')
@push('style')
@endpush
@section('content')
    @include('jenis.form')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
        </div>
        <div class="card-body">
            @include('templates.alert')
            <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#jenis">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah jenis</span>
            </a>
            @include('jenis.data')
        </div>
    </div>
@endsection
@push('script')
    <script>
        console.log('jenis')
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_jenis = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama_jenis}</b></span> akan dihapus?`,
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

        $('#jenis').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            const mode = btn.data('mode')
            const nama_jenis = btn.data('nama_jenis')
            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit jenis')
                modal.find('#nama_jenis').val(nama_jenis)
                modal.find('.modal-body form').attr('action', "{{ url('jenis') }}/" + id)
                modal.find('#method').html('@method("PATCH")')
            } else {
                modal.find('.modal-title').text('Input jenis')
                modal.find('#nama_jenis').val('')
                modal.find('.modal-body form').attr('action', '{{ url('jenis') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
