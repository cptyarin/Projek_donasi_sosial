<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenerimaRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    public function rules()
    {
        return [
            'nama'             => 'required|string|max:255',
            'alamat'           => 'required|string',
            'no_hp'            => 'required|string|max:20',
            'kategori_bantuan' => 'required|string|max:100',
        ];
    }
}