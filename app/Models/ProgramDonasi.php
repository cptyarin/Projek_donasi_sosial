<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDonasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_program',
        'deskripsi',
        'target_dana',
        'tanggal_mulai',
        'tanggal_selesai',
        'gambar',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'target_dana' => 'decimal:2',
    ];

    // Relasi ke donasi – tentukan foreign key 'program_id'
    public function donasis()
    {
        return $this->hasMany(Donasi::class, 'program_id');
    }

    public function penyalurans()
    {
        return $this->hasMany(PenyaluranBantuan::class, 'program_id');
    }
}