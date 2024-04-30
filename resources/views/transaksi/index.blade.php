@extends('templates.layout')
@push('style')
@endpush
@section('content')
<!-- Content Row -->
<div class="row">

    <div class="menu-container col-xl-6 col-lg-5">
        <ul class="menu-item row" style="list-style-type: none;">
            @foreach ($menu as $item)
            <li class="card text-center mr-2 mb-2" style="width: 9rem; list-style-type: none;" data-harga="{{ $item->harga }}" data-id="{{ $item->id }}" data-stok="{{ optional($item->stok)->jumlah }}">
                <img src="{{ empty($item->image)? asset('img/no-image.png') : asset('storage/pictures-menu/'.$item->image)}}" class="img-fluid" style="max-height: 50%; object-fit: cover;" alt="...">
                <p class=" my-2 font-weight-bold text-primary">{{ $item->nama_menu }}
                    <br><small class="text-secondary my-2">Rp. {{ number_format($item->harga,0,",",".") }}</small> | <small class="text-secondary my-2">Stok: {{ optional($item->stok)->jumlah }}</small>
                </p>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Payment -->
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                    <h6 class="m-0 font-weight-bold float-end">{{ date('Y-m-d') }}</h6>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <h6>Pelanggan:</h6>
                <select name="pelanggan_id" id="pelanggan_id" class="form-control mb-3">
                    @foreach($pelanggan as $item)
                    <option value="{{  $item->id }}" class="pelanggan">{{ $item->nama_pelanggan }}</option>
                    @endforeach
                </select>
                <h6>List menu:</h6>
                <ul class="ordered-list">
                </ul>
                Total Bayar: <h2 id="total">0</h2>
                <h6>Metode pembayaran:</h6>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control mb-3">
                    <option value="Tunai" class="metode_pembayaran">Tunai</option>
                    <option value="Debit" class="metode_pembayaran">Debit</option>
                </select>
                <button class="btn btn-primary" id="btn-bayar">Bayar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(function() {
        const orderedList = [];

        const sum = () => {
            return orderedList.reduce((accumulator, object) => {
                return accumulator + (object.harga * object.qty);
            }, 0);
        };

        const changeQty = (el, inc) => {
            // Mengubah di array
            const id = $(el).closest('li').data('id');
            const index = orderedList.findIndex(list => list.id == id);
            const qty = orderedList[index].qty;
            const harga = orderedList[index].harga;
            const stok = parseInt($(el).closest('li').data('stok'));

            // Memeriksa apakah penambahan qty akan melebihi stok
            if (qty > stok) {
                alert('Stok habis, tidak dapat menambahkan menu ini.');
                return;
            }
            orderedList[index].qty += (orderedList[index].qty == 1 && inc == -1) ? 0 : inc;

            // Mengubah qty & subtotal
            const listItem = $(el).closest('li');
            const txt_subtotal = listItem.find('.subtotal');
            const txt_qty = listItem.find('.qty-item');
            txt_qty.val(parseInt(txt_qty.val()) == 1 && inc == -1 ? 1 : parseInt(txt_qty.val()) + inc);
            txt_subtotal.text(orderedList[index].harga * orderedList[index].qty);

            // Mengubah jumlah total
            $('#total').html(sum());
        };

        // Events
        $('.ordered-list').on('click', '.btn-dec', function() {
            changeQty(this, -1);
        });
        $('.ordered-list').on('click', '.btn-inc', function() {
            const id = $(this).closest('li').data('id');
            const index = orderedList.findIndex(list => list.id == id);
            const qty = orderedList[index].qty;
            const stok = parseInt($(this).closest('li').data('stok'));

            if (qty >= stok) {
                // alert('Stok habis, tidak dapat menambahkan menu ini.');
                return;
            }
            changeQty(this, 1);
        });
        $('.ordered-list').on('click', '.remove-item', function() {
            const item = $(this).closest('li')[0];
            const id = $(this).closest('li').data('id');
            const index = orderedList.findIndex(list => list.id == id);
            orderedList.splice(index, 1);
            $(item).remove();
            $('#total').html(sum());
        });
        $('.ordered-list').on('change', '.qty-item', function() {
            const id = $(this).closest('li').data('id');
            const index = orderedList.findIndex(list => list.id == id);
            const newQty = parseInt($(this).val());

            // Ensure the new quantity is valid
            if (isNaN(newQty) || newQty < 1) {
                alert('Quantity should be a positive number.');
                return;
            }

            // Update the quantity in the orderedList array
            orderedList[index].qty = newQty;

            // Update subtotal and total
            const listItem = $(this).closest('li');
            const txt_subtotal = listItem.find('.subtotal');
            txt_subtotal.text(orderedList[index].harga * newQty);
            $('#total').html(sum());
        });



        $('#btn-bayar').on('click', function() {


            const date = new Date();
            const formattedDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);

            const pelangganId = $('#pelanggan_id').val();
            const metodePembayaran = $('#metode_pembayaran').val();

            console.log("Ordered List:", orderedList);
            console.log("Total:", sum());
            console.log("Pelanggan ID:", pelangganId);
            console.log("Metode Pembayaran:", metodePembayaran);

            // Memastikan total harga valid
            const total = sum();
            if (isNaN(total) || total <= 0) {
                alert('Total harga tidak valid!');
                return;
            }

            $.ajax({
                url: "{{ route('transaksi.store') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    orderedList: orderedList,
                    total: total,
                    pelanggan_id: pelangganId,
                    metode_pembayaran: metodePembayaran,
                    tanggal_transaksi: formattedDate
                },
                success: function(data) {
                    console.log("Success:", data);
                    Swal.fire({
                        title: data.message,
                        showDenyButton: true,
                        confirmButtonText: "Cetak Nota",
                        denyButtonText: `Ok`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.open("{{  url('nota') }}/" + data.notrans)
                        } else if (result.isDenied) {
                            location.reload()
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Error:", textStatus, errorThrown);
                }

            })
        })

        $(".menu-item li").click(function() {
            const menu_clicked = $(this).text();
            const data = $(this).data();
            const harga = parseFloat(data.harga);
            const qty = parseInt(data.qty);
            const id = parseInt(data.id);
            const stok = parseInt(data.stok);

            if (stok === 0) {
                return;
            }

            if (orderedList.length !== 0 && orderedList.some(list => list.id === id)) {
                const index = orderedList.findIndex(list => list.id === id);

                if (orderedList[index].qty >= stok) {
                    // alert('Stok habis, tidak dapat menambahkan menu ini.');
                    return;
                }
                orderedList[index].qty += 1;

            } else {
                const dataN = {
                    'id': id, // Tambahkan menu_id
                    'menu': menu_clicked,
                    'harga': harga,
                    'qty': 1,
                    'stok': stok
                };
                orderedList.push(dataN);
            }

            $('.ordered-list li').remove();
            orderedList.forEach(function(data) {
                let listOrder = `<li class="row" style="list-style-type:none" data-id="${data.id}" data-stok="${data.stok}">
                    <hr>
                    <div class="mr-3 col-sm-6">
                        <h5 class="font-weight-bold mr-3">${data.menu}</h5>
                        <p>Rp. ${data.harga}<br>Subtotal: Rp. <span class="subtotal">${data.harga * data.qty}</span></p>
                    </div>
                    <div class="row top-50 start-50 translate-middle col-sm-6">
                        <button style="height:38px" class="btn-dec btn btn-sm btn-primary"><i class='fas fa-minus'></i></button>
                        <input class="qty-item form-control" type="number" style="width:25%" value="${data.qty}" min="1" />
                        <button style="height:38px" class="btn-inc btn btn-sm btn-primary"><i class='fas fa-plus'></i></button>
                        <button style="height:38px" class="btn btn-sm btn-danger remove-item ml-3"><i class='fas fa-trash'></i></button> 
                    </div>
                </li>`;
                $('.ordered-list').append(listOrder);
            });

            $('#total').html(sum());
        });

    });
</script>

@endpush