@extends('layouts.app')
@section('title', 'Detail Penerima')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-user me-2 text-primary"></i> Detail Penerima Bantuan
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Nama</div>
                    <div class="col-sm-8">{{ $recipient->nama }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Alamat</div>
                    <div class="col-sm-8">{{ $recipient->alamat }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">No HP</div>
                    <div class="col-sm-8">{{ $recipient->no_hp }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Kategori Bantuan</div>
                    <div class="col-sm-8"><span class="badge bg-primary-light text-primary">{{ $recipient->kategori_bantuan }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Total Penyaluran</div>
                    <div class="col-sm-8">{{ $recipient->penyalurans->count() }} kali</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('recipients.index') }}" class="btn btn-outline-mokapos">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <a href="{{ route('recipients.edit', $recipient) }}" class="btn btn-primary-mokapos">
                    <i class="fas fa-edit me-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>

@endsection