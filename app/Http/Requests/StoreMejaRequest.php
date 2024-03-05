<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMejaRequest extends FormRequest
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
            'nomor_meja' => 'required',
            'nomor_meja' => 'unique',
            'kapasitas' => 'required'
        ];
    }
    public function messages()
    {
        return ['nomor_meja.required' => 'Anda belum memasukkan NOMOR MEJA!'];
        return ['nomor_meja.unique' => 'NOMOR MEJA sudah ada!'];
        return ['kapasitas.required' => 'Anda belum memasukkan KAPASITAS!'];
    }
}
