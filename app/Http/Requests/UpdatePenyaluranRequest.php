<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenyaluranRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    public function rules()
    {
        return [
            'penerima_id'        => 'required|exists:penerima_bantuans,id',
            'program_id'         => 'required|exists:program_donasis,id',
            'nominal'            => 'required|numeric|min:0',
            'tanggal_penyaluran' => 'required|date',
            'keterangan'         => 'nullable|string',
        ];
    }
}