<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTitipanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required',
            'nama_supplier' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required'
        ];
    }
    public function messages()
    {
        return ['nama_produk.required' => 'Anda belum memasukkan NAMA PRODUK!', 'nama_supplier.required' => 'Anda belum memasukkan NAMA SUPPLIER!', 'harga_beli.required' => 'Anda belum memasukkan HARGA BELI!', 'stok.required' => 'Anda belum memasukkan STOK!'];
    }
}
