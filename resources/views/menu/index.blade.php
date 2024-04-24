@extends('templates.layout')
@push('style')
@endpush
@section('content')
@include('menu.form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $page }}</h6>
    </div>
    <div class="card-body">
        @include('templates.alert')
        <a href="#" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#menu">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah menu</span>
        </a>
        <a href="#" class="btn btn-danger btn-icon-split mb-3" data-toggle="modal" data-target="#menuExport">
            <span class="icon text-white-50">
                <i class="fas fa-file-export"></i>
            </span>
            <span class="text">Export</span>
        </a>
        <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#menuImport">
            <span class="icon text-white-50">
                <i class="fas fa-file-import"></i>
            </span>
            <span class="text">Import</span>
        </a>
        @include('menu.data')
    </div>
</div>
@endsection
@push('script')
<script>
    console.log('menu')

    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    });

    $('.delete-data').on('click', function(e) {
        e.preventDefault()
        let nama_menu = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: `Apakah data <span style="color:red"><b>${nama_menu}</b></span> akan dihapus?`,
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

    $('#menu').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        const mode = btn.data('mode')
        const nama_menu = btn.data('nama_menu')
        const harga = btn.data('harga')
        const deskripsi = btn.data('deskripsi')
        const jenis_id = btn.data('jenis_id')
        const image = btn.data('image')
        const id = btn.data('id')
        const modal = $(this)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit menu')
            modal.find('#nama_menu').val(nama_menu)
            modal.find('#harga').val(harga)
            modal.find('#deskripsi').val(deskripsi)
            modal.find('#jenis_id').val(jenis_id)
            modal.find('#old_image').val(image)
            modal.find('.img-preview').attr('src', '{{ asset("storage/pictures-menu") }}/' + image)
            modal.find('.modal-body form').attr('action', "{{ url('menu') }}/" + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input menu')
            modal.find('#nama_menu').val('')
            modal.find('#harga').val('')
            modal.find('#deskripsi').val('')
            modal.find('#jenis_id').val('')
            modal.find('#old_image').val('')
            modal.find('.img-preview ').attr('src', '')
            modal.find('.modal-body form').attr('action', "{{ url('menu')}}")
            modal.find('#method').html('')
        }
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endpush