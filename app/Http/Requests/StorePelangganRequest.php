<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_pelanggan' => 'required',
            'email' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nama_pelanggan.required' => 'Anda belum memasukkan NAMA PELANGGAN!',
            'email.required' => 'Anda belum memasukkan EMAIL!',
            'nomor_telepon.required' => 'Anda belum memasukkan NOMOR TELEPON!',
            'alamat.required' => 'Anda belum memasukkan ALAMAT!',
        ];
    }
}
