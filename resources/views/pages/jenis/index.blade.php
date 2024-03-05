@extends('templates.layout')
@push('style')
@endpush
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jenis</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formJenisModal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah jenis</span>
    </button>
    @include('pages.jenis.data')
@endsection
@include('pages.jenis.form')
@push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_jenis = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama_jenis}</b></span> akan dihapus?`,
                text: "Data tidak bisa dikembalikan!",
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

        $('#formjenisModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_jenis = btn.data('nama_jenis')
            const id = btn.data('id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit jenis')
                modal.find('#nama_jenis').val(nama_jenis)
                modal.find('.modal-body form').attr('action', '{{ url('jenis') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input jenis')
                modal.find('#nama_jenis').val('')
                modal.find('.modal-body form').attr('action', '{{ url('jenis') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
