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
    <h1 class="h3 mb-4 text-gray-800">Meja</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formMejaModal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah meja</span>
    </button>
    @include('pages.meja.data')
@endsection
@include('pages.meja.form')
@push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nomor_meja = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nomor_meja}</b></span> akan dihapus?`,
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

        $('#formMejaModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nomor_meja = btn.data('nomor_meja')
            const kapasitas = btn.data('kapasitas')
            const id = btn.data('id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit meja')
                modal.find('#nomor_meja').val(nomor_meja)
                modal.find('#kapasitas').val(kapasitas)
                modal.find('.modal-body form').attr('action', '{{ url('meja') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input meja')
                modal.find('#nomor_meja').val('')
                modal.find('#kapasitas').val('')
                modal.find('.modal-body form').attr('action', '{{ url('meja') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
