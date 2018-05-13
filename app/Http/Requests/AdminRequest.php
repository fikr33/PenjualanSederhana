<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'c'=>'required|numeric',
            'no'=>'unique:suppliers'
        ];
    }

    public function messages(){
        return[
            'c.required'=>'No Telpon Tidak Boleh Kosong',
            'c.numeric'=>'No Telpon Tidak Boleh Menggunakan Huruf',
            'no.unique'=>'No Telpon Sudah Terdaftar'
        ];
    }
}
