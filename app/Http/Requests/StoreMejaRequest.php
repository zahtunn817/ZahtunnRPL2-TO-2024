<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMejaRequest extends FormRequest
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
            'nomor_meja' => 'required|max:9',
            'kapasitas' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nomor_meja.required' => 'Anda belum memasukkan NOMOR MEJA!', 'kapasitas.required' => 'Anda belum memasukkan KAPASITAS!'
        ];
    }
}
