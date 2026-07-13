<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranBantuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'penerima_id',
        'program_id',
        'nominal',
        'tanggal_penyaluran',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_penyaluran' => 'date',
        'nominal' => 'decimal:2',
    ];

    // Relasi ke penerima – tentukan foreign key
    public function penerima()
    {
        return $this->belongsTo(PenerimaBantuan::class, 'penerima_id');
    }

    // Relasi ke program – tentukan foreign key (sudah sebelumnya)
    public function program()
    {
        return $this->belongsTo(ProgramDonasi::class, 'program_id');
    }
}