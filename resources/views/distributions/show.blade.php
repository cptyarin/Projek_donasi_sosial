@extends('layouts.app')
@section('title', 'Detail Penyaluran')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-box me-2 text-primary"></i> Detail Penyaluran Bantuan
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Penerima</div>
                    <div class="col-sm-8">{{ $distribution->penerima->nama ?? '-' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Program</div>
                    <div class="col-sm-8">{{ $distribution->program->nama_program ?? '-' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Nominal</div>
                    <div class="col-sm-8"><strong>Rp {{ number_format($distribution->nominal, 0, ',', '.') }}</strong></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Tanggal Penyaluran</div>
                    <div class="col-sm-8">{{ $distribution->tanggal_penyaluran->format('d-m-Y') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Keterangan</div>
                    <div class="col-sm-8">{{ $distribution->keterangan ?: '-' }}</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('distributions.index') }}" class="btn btn-outline-mokapos">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <a href="{{ route('distributions.edit', $distribution) }}" class="btn btn-primary-mokapos">
                    <i class="fas fa-edit me-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>

@endsection