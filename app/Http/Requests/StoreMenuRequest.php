<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMenuRequest extends FormRequest
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
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }
    public function messages()
    {
        return ['nama_menu.required' => 'Anda belum memasukkan NAMA KATEGORI!', 'harga.required' => 'Anda belum memasukkan HARGA!', 'deskripsi.required' => 'Anda belum memasukkan DESKRIPSI!', 'jenis_id.required' => 'Anda belum memasukkan JENIS!'];
    }
}
