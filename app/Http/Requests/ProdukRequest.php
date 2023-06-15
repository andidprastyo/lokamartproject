<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id_owner'=>'required',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'stok_produk' => 'required',
            'harga_produk' => 'required',
            'desk_produk' => 'required',
            'gambar_produk' => 'required',
        ];
    }
}
