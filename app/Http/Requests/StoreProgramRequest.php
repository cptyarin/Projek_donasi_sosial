<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    public function rules()
    {
        return [
            'nama_program'   => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'target_dana'    => 'required|numeric|min:0',
            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai'=> 'required|date|after:tanggal_mulai',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}