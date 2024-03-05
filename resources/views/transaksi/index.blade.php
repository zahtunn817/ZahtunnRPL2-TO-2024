@extends('templates.layout')
@push('style')
@endpush
@section('content')
<!-- Content Row -->
<div class="row">

    <div class="menu-container col-xl-6 col-lg-5">
        <ul class="menu-item row" style="list-style-type: none;">
            @foreach ($menu as $item)
            <li class="card text-center mr-2 mb-2" style="width: 9rem; list-style-type: none;" data-harga="{{ $item->harga }}" data-id="{{ $item->id }}">
                <img src="{{ empty($item->image)? asset('img/no-image.png') : asset('storage/pictures-menu/'.$item->image)}}" class="img-fluid" style="max-height: 50%; object-fit: cover;" alt="...">
                <p class="card-text my-2 font-weight-bold text-primary">{{ $item->nama_menu }}</p>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Payment -->
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                  <ul class="ordered-list">
                  </ul>
                  Total Bayar: <h2 id="total">0</h2>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(function(){
        const orderedList = []
        let total = 0;
        const sum = () =>{
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                },0)
            };

            const changeQty = (el, inc) => {
                //ubah di array
                const id = $(el).closest('div')[0].dataset.id;
                const index = orderedList.findIndex(list => list.id == id)
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

                //ubah qty & subtotal
                const txt_subtotal =$(el).closest('li').find('.subtotal')[0];
                const txt_qty =$(el).closest('li').find('.qty-item')[0]
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc;
                txt_subtotal.innerHTML =  orderedList[index].harga * orderedList[index].qty;
        
                //ubah jumlah total
                $('#total').html(sum())
            }

            //events
        $('.ordered-list').on('click', '.btn-dec', function(){changeQty(this, -1)})
        $('.ordered-list').on('click', '.btn-inc', function(){changeQty(this, 1)})
        $('.ordered-list').on('click', '.remove-item', function(){
            const item = $(this).closest('li')[0];
            let index = orderedList.findIndex(list => list.menu_id == parseInt(item.dataset.id))
            orderedList.splice(index,1)
            $(item).remove();
            $('#total').html(sum())
        })
        
        
    

        $(".menu-item li").click(function(){
            const menu_clicked = $(this).text();
            const data = $(this)[0].dataset;
            const harga = parseFloat(data.harga);
            const qty = data.qty;
            const id = data.id;

            if(orderedList.lenght !== 0 && orderedList.some(list => list.id === id)){
                let index = orderedList.findIndex(list => list.id === id)
                orderedList[index].qty += 1
            }else{
                let dataN = {'id':id, 'menu':menu_clicked, 'harga':harga,'qty':1}
                orderedList.push(dataN);
            }
            $('.ordered-list li').remove()
            orderedList.forEach(function(data){
                let listOrder = `<li class="row" style="list-style-type:none" data-id="${data.id}">
                        <hr>
                        <div class="mr-3 col-sm-6">
                            <h5 class="font-weight-bold mr-3">${data.menu}</h5>
                            <p>Rp. ${data.harga}<br>Subtotal: Rp. <span class="subtotal">${data.harga * data.qty}</span></p>
                        </div>
                        <div class="row top-50 start-50 translate-middle col-sm-6">
                            <button style="height:38px" class="btn-dec btn btn-sm btn-primary"><i class='fas fa-minus'></i></button>
                            <input class="qty-item form-control" type="text" style="width:25%" value="${data.qty}" placeholder="${data.qty}" readonly />
                            <button style="height:38px" class="btn-inc btn btn-sm btn-primary"><i class='fas fa-plus'></i></button>
                            <button style="height:38px" class="btn btn-sm btn-danger remove-item ml-3"><i class='fas fa-trash'></i></button> 
                        </div>
                    </li>`
                    $('.ordered-list').append(listOrder)
            })
            $('#total').html(sum())
        });
        //     $(".menu-item li").click(function(){
        //         //mengambil data
        //         const menu_clicked = $(this).text();
        //         const data = $(this)[0].dataset;
        //         const harta = parseFloat(data.harta);
        //         const id = parseInt(data.id)

        //         if(orderedList.every(list => list.menu_id !== id)){
        //             let dataN = {'menu_id' :id, 'menu' : menu_clicked, 'harga': harga, 'qty': 1}
        //             orderedList.push(dataN);
        //             let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`
        //                 listOrder +='Sub Total : Rp. '+harga
        //                 listOrder +=`<button class='remove-item'>Hapus</button><button class="btn-dec"> - </button>`
        //                 listOrder +=`<input class="qty-item" type="number" value="1" style="width:30px;" readonly /><button class="btn-dec"> + </button><h2><span class="subtotal">${harga * 1}</span></li>`
        //             $('.ordered-list').append(listOrder)
        //         }
        //         $('#total').html(sum())
        //     });

        
    });

    // $(function(){
    //     const orderedList = []
    //     let total = 0

    //     const sum = () =>{
    //         return orderedList.reduce((accumulator, object) => {
    //             return accumulator + (object.harga * object.qty);
    //         },0)
    //     };

    //     const changeQty = (el, inc) => {
    //         //ubah di array
    //         const id = $(el).closest('li')[0].dataset.id;
    //         const index = orderedList.findIndex(list => list.menu_id == id)
    //         orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

    //         //ubah qty & subtotal
    //         const txt_subtotal =$(el).closest('li').find('.subtotal')[0];
    //         const txt_qty =$(el).closest('li').find('.qty-item')[0]
    //         txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
    //         txt_subtotal.innerHTML =  orderedList[index].harga * orderedList[index].qty;
       
    //         //ubah jumlah total
    //         $('#total').html(sum())
    //     }

    //     //events
    //     $('.ordered-list').on('click', '.btn-dec', function(){changeQty(this, -1)})
    //     $('.ordered-list').on('click', '.btn-inc', function(){changeQty(this, 1)})
    //     $('.ordered-list').on('click', '.remove-item', function(){
    //         const item = $(this).closest('li')[0];
    //         let index = orderedList.findIndex(list => list.menu_id == parseInt(item.dataset.id))
    //         orderedList.splice(index,1)
    //         $(item).remove();
    //         $('#total').html(sum())
    //     })

    //     $('#btn-bayar').on('click', function(){
    //         $.ajax({
    //             url: "{{ route('transaksi.store') }}",
    //             method: "POST",
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 orderedList: orderedList,
    //                 total: sum()
    //             },
    //             success: function(data){
    //                 console.log(data)
    //                 Swal.fire({
    //                     title: data.message,
    //                     showDenybutton: true,
    //                     confirmButtonText: "Cetak Nota",
    //                     denyButtonText: `Oke`
    //                 }).then((result)=>{
    //                     if(result.isConfirmed){
    //                         window.open("{{ url('nota/2343423') }}")
    //                         location.reload()
    //                     }else if (result.isDenied){
    //                         location.reload()
    //                     }
    //                 });
    //             },
    //             error: function(request, status, error){
    //                 console.log(status, error)
    //                 Swal.fire('Pemesanan Gagal!')
    //             }
    //         })
    //     })


    //     $(".menu-item li").click(function(){
    //         //mengambil data
    //         const menu_clicked = $(this).text();
    //         const data = $(this)[0].dataset;
    //         const harta = parseFloat(data.harta);
    //         const id = parseInt(data.id)

    //         if(orderedList.every(list => list.menu_id !== id)){
    //             let dataN = {'menu_id' :id, 'menu' : menu_clicked, 'harga': harga, 'qty': 1}
    //             orderedList.push(dataN);
    //             let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>`
    //                 listOrder +='Sub Total : Rp. '+harga
    //                 listOrder +=`<button class='remove-item'>Hapus</button><button class="btn-dec"> - </button>`
    //                 listOrder +=`<input class="qty-item" type="number" value="1" style="width:30px;" readonly /><button class="btn-dec"> + </button><h2><span class="subtotal">${harga * 1}</span></li>`
    //             $('.ordered-list').append(listOrder)
    //         }
    //         $('#total').html(sum())
    //     });
    // });
</script>
@endpush
