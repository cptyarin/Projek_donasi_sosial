<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'nominal',
        'tanggal_donasi',
        'bukti_transfer',
        'status',
    ];

    protected $casts = [
        'tanggal_donasi' => 'date',
        'nominal' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke program – tentukan foreign key 'program_id'
    public function program()
    {
        return $this->belongsTo(ProgramDonasi::class, 'program_id');
    }
}