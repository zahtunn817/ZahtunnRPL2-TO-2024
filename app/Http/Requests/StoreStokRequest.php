<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStokRequest extends FormRequest
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
            'jumlah' => 'required',
            // 'menu_id' => 'required|unique:stok'
        ];
    }
    public function messages()
    {
        return [
            'jumlah.required' => 'Anda belum memasukkan STOK!',
            'menu_id.required' => 'Anda belum memasukkan MENU!',
            // 'menu_id.unique' => 'MENU sudah ada!',
        ];
    }
}
