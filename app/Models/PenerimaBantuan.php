<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'kategori_bantuan',
    ];

    // RELASI KE PENYALURAN – TENTUKAN FOREIGN KEY
    public function penyalurans()
    {
        return $this->hasMany(PenyaluranBantuan::class, 'penerima_id');
    }
}