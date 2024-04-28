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
        <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#user">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah user</span>
        </a>
        @include('user.data')
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
            modal.find('#password').val('')
            modal.find('#nomor_telepon').val(nomor_telepon)
            modal.find('#alamat').val(alamat)
            modal.find('#image').val(image)
            modal.find('#roles').val(roles)
            modal.find('.modal-body form').attr('action', "{{ url('user') }}/" + id)
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
            modal.find('.modal-body form').attr('action', "{{ url('user ') }}")
            modal.find('#method').html('')
        }
    })
</script>
@endpush