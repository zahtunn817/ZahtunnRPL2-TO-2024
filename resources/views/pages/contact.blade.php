@extends('templates.layout')
@push('style')
<style>
    .google-map {
        padding-bottom: 50%;
        position: relative;
    }

    .google-map iframe {
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        position: absolute;
    }
</style>
@endpush
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Cafe<sup>SE2</sup></h1>
<div class="row">
    <div class="col-lg-6">
        <img class="mb-4 img-fluid" src="{{ asset('img/kantor.jpg') }}" alt="Gambar kantor gwej">
        <p>Jl. Siliwangi No.41, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212</p>
        <p>Email: zahratunn817@gmail.com</p>
        <p>Telepon: 0895372166600</p>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lokasi</h6>
            </div>
            <div class="card-body">
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5332103678948!2d107.13668559999999!3d-6.8264814000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68525760aaa209%3A0x4a4020b1836d1a1d!2sSMK%20Negeri%201%20Cianjur!5e0!3m2!1sen!2sid!4v1713848238633!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hubungi</h6>
            </div>
            <div class="card-body">
                <form action="/kirim-pesan" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input class="form-control" type="text" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="komentar">Komentar:</label>
                        <textarea class="form-control" id="komentar" name="komentar" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div> -->
@endsection
@push('script')
@endpush