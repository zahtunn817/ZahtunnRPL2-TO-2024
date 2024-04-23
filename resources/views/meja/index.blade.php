@extends('templates.layout')
@push('style')
@endpush
@section('content')
@include('meja.form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
    </div>
    <div class="card-body">
        @include('templates.alert')
        <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#meja">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah meja</span>
        </a>
        <a href="#" class="btn btn-danger btn-icon-split mb-3" data-toggle="modal" data-target="#mejaExport">
            <span class="icon text-white-50">
                <i class="fas fa-file-export"></i>
            </span>
            <span class="text">Export</span>
        </a>
        <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#mejaImport">
            <span class="icon text-white-50">
                <i class="fas fa-file-import"></i>
            </span>
            <span class="text">Import</span>
        </a>
        @include('meja.data')
    </div>
</div>
@endsection
@push('script')
<script>
    console.log('meja')
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    });

    $('.delete-data').on('click', function(e) {
        e.preventDefault()
        let nomor_meja = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: `Apakah data <span style="color:red"><b>${nomor_meja}</b></span> akan dihapus?`,
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

    $('#meja').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        const mode = btn.data('mode')
        const nomor_meja = btn.data('nomor_meja')
        const kapasitas = btn.data('kapasitas')
        const id = btn.data('id')
        const modal = $(this)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit meja')
            modal.find('#nomor_meja').val(nomor_meja)
            modal.find('#kapasitas').val(kapasitas)
            modal.find('.modal-body form').attr('action', "{{ url('meja ') }}/" + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input meja')
            modal.find('#nomor_meja').val('')
            modal.find('#kapasitas').val('')
            modal.find('.modal-body form').attr('action', "{{ url('meja') }}")
            modal.find('#method').html('')
        }
    })
</script>
@endpush