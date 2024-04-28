@extends('templates.layout')
@push('style')
@endpush
@section('content')
@include('transaksi.form')
@include('transaksi.print')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
    </div>
    <div class="card-body">
        @include('templates.alert')
        <a href="{{ url('mulai-transaksi') }}" class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah transaksi</span>
        </a>
        <a href="#" class="btn btn-danger btn-icon-split mb-3" data-toggle="modal" data-target="#transaksiExport">
            <span class="icon text-white-50">
                <i class="fas fa-file-export"></i>
            </span>
            <span class="text">Export</span>
        </a>
        <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#transaksiImport">
            <span class="icon text-white-50">
                <i class="fas fa-file-import"></i>
            </span>
            <span class="text">Import</span>
        </a>
        @include('transaksi.data')
    </div>
</div>
@endsection
@push('script')
<script>
    console.log('transaksi')
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    });

    $('.delete-data').on('click', function(e) {
        e.preventDefault()
        let id = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: `Apakah data <span style="color:red"><b>${id}</b></span> akan dihapus?`,
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

    $('#transaksi').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        const mode = btn.data('mode')
        const id = btn.data('id')
        const tanggal_transaksi = btn.data('tanggal_transaksi')
        const total_harga = btn.data('total_harga')
        const metode_pembayaran = btn.data('metode_pembayaran')
        const keterangan = btn.data('keterangan')
        const pelanggan_id = btn.data('pelanggan_id')
        const modal = $(this)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Tambah keterangan')
            modal.find('.tanggal_transaksi').text(tanggal_transaksi)
            modal.find('.id').text(id)
            modal.find('.tanggal_transaksi').text(tanggal_transaksi)
            modal.find('.total_harga').text(total_harga)
            modal.find('.metode_pembayaran').text(metode_pembayaran)
            modal.find('.pelanggan_id').text(pelanggan_id)
            modal.find('#keterangan').val(keterangan)
            modal.find('.modal-body form').attr('action', "{{ url('transaksi') }}/" + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input transaksi')
            modal.find('#id').val('')
            modal.find('#tanggal_transaksi').val('')
            modal.find('#total_harga').val('')
            modal.find('#metode_pembayaran').val('')
            modal.find('#keterangan').val('')
            modal.find('#pelanggan_id').val('')
            modal.find('.modal-body form').attr('action', "{{ url('transaksi') }}")
            modal.find('#method').html('')
        }
    })
</script>
@endpush