@extends('templates.layout')
@push('style')
@endpush
@section('content')
    @include('titipan.form')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
        </div>
        <div class="card-body">
            @include('templates.alert')
            <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#titipan">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah data</span>
            </a>
            <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#titipanExport">
                <span class="icon text-white-50">
                    <i class="fas fa-upload"></i>
                </span>
                <span class="text">Export</span>
            </a>
            <a href="#" class="btn btn-warning btn-icon-split mb-3" data-toggle="modal" data-target="#titipanImport">
                <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                </span>
                <span class="text">Import</span>
            </a>
            @include('titipan.data')
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_produk = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama_produk}</b></span> akan dihapus?`,
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
    </script>
@endpush
