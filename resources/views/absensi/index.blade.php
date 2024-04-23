@extends('templates.layout')
@push('style')
@endpush
@section('content')
@include('absensi.form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
    </div>
    <div class="card-body">
        @include('templates.alert')
        <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#absensi">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah data</span>
        </a>
        <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#absensiExport">
            <span class="icon text-white-50">
                <i class="fas fa-file-export"></i>
            </span>
            <span class="text">Export</span>
        </a>
        <a href="#" class="btn btn-warning btn-icon-split mb-3" data-toggle="modal" data-target="#absensiImport">
            <span class="icon text-white-50">
                <i class="fas fa-file-import"></i>
            </span>
            <span class="text">Import</span>
        </a>
        @include('absensi.data')
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
        let namaKaryawan = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: `Apakah data <span style="color:red"><b>${namaKaryawan}</b></span> akan dihapus?`,
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

    $('#absensi').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        const mode = btn.data('mode')
        const namaKaryawan = btn.data('nama_karyawan')
        const tanggalMasuk = btn.data('tanggalMasuk')
        const waktuMasuk = btn.data('waktuMasuk')
        const status = btn.data('status')
        const waktuKeluar = btn.data('waktuKeluar')
        const id = btn.data('id')
        const modal = $(this)
        console.log(namaKaryawan)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit absensi')
            modal.find('#namaKaryawan').val(namaKaryawan)
            modal.find('#tanggalMasuk').val(tanggalMasuk)
            modal.find('#waktuMasuk').val(waktuMasuk)
            modal.find('#status').val(status)
            modal.find('#waktuKeluar').val(waktuKeluar)
            modal.find('.modal-body form').attr('action', "{{ url('absensi') }}/" + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input absensi')
            modal.find('#namaKaryawan').val('')
            modal.find('#tanggalMasuk').val('')
            modal.find('#waktuMasuk').val('')
            modal.find('#status').val('')
            modal.find('#waktuKeluar').val('')
            modal.find('.modal-body form').attr('action', "{{ url('absensi') }}")
            modal.find('#method').html('')
        }
    })


    document.addEventListener("DOMContentLoaded", function() {
        const btnSelesai = document.querySelectorAll('.btnSelesai');

        btnSelesai.forEach(btn => {
            btn.addEventListener('click', function() {
                const absensiId = this.getAttribute('data-id');
                updateWaktuKeluar(absensiId);
            });
        });

        function updateWaktuKeluar(absensiId) {
            // Kirim request AJAX untuk update waktu keluar
            fetch('/update-waktu-keluar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: absensiId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Waktu keluar berhasil diupdate!');
                        location.reload(); // Reload halaman untuk refresh data
                    } else {
                        alert('Gagal mengupdate waktu keluar.');
                    }
                });
        }
    });
</script>
@endpush