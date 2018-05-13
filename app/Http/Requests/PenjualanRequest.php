<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenjualanRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'kode_barang'=>'unique:penjualans'
        ];
    }
    public function message(){
        return[
            'kode_barang.required'=>'Kode Transaksi Harus Di Isi',
            'kode_barang.unique'=>'Kode Transaksi Sudah Terpakai'
        ];
    }
}
