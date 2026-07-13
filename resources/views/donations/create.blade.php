@extends('layouts.app')
@section('title', 'Donasi Baru')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-hand-holding-heart me-2 text-success"></i> Form Donasi
            </div>
            <div class="card-body">
                <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="program_id" class="form-label-mokapos">Pilih Program Donasi <span class="text-danger">*</span></label>
                        <select class="form-select form-control-mokapos @error('program_id') is-invalid @enderror" name="program_id">
                            <option value="">-- Pilih Program --</option>
                            @foreach($programs as $prog)
                                <option value="{{ $prog->id }}" {{ old('program_id') == $prog->id ? 'selected' : '' }}>
                                    {{ $prog->nama_program }} (Target: Rp {{ number_format($prog->target_dana, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nominal" class="form-label-mokapos">Nominal Donasi (Rp) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control form-control-mokapos @error('nominal') is-invalid @enderror" 
                               name="nominal" value="{{ old('nominal') }}" placeholder="Masukkan nominal donasi" min="1">
                        @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_donasi" class="form-label-mokapos">Tanggal Donasi <span class="text-danger">*</span></label>
                        <input type="date" class="form-control form-control-mokapos @error('tanggal_donasi') is-invalid @enderror" 
                               name="tanggal_donasi" value="{{ old('tanggal_donasi', date('Y-m-d')) }}">
                        @error('tanggal_donasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bukti_transfer" class="form-label-mokapos">Bukti Transfer</label>
                        <input type="file" class="form-control form-control-mokapos @error('bukti_transfer') is-invalid @enderror" 
                               name="bukti_transfer" accept="image/*">
                        <small class="text-muted">Upload bukti transfer untuk verifikasi (opsional)</small>
                        @error('bukti_transfer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> 
                        Donasi Anda akan masuk dalam status <strong>Pending</strong> dan akan diverifikasi oleh admin.
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Donasi
                        </button>
                        <a href="{{ route('donations.index') }}" class="btn btn-outline-mokapos">
                            <i class="fas fa-arrow-left me-2"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection