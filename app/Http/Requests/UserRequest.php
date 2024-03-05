<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'roles' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Anda belum memasukkan NAMA!',
            'email.required' => 'Anda belum memasukkan EMAIL!',
            'password.required' => 'Anda belum memasukkan PASSWORD!',
            'jk.required' => 'Anda belum memasukkan JENIS KELAMIN!',
            'tgl_lahir.required' => 'Anda belum memasukkan TANGGAL LAHIR!',
            'nomor_telepon.required' => 'Anda belum memasukkan NOMOR TELEPON!',
            'alamat.required' => 'Anda belum memasukkan ALAMAT!',
            'roles.required' => 'Anda belum memasukkan HAK AKSES!',
        ];
    }
}
