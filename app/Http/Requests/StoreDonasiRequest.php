<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonasiRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'program_id'     => 'required|exists:program_donasis,id',
            'nominal'        => 'required|numeric|min:1',
            'tanggal_donasi' => 'required|date',
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}