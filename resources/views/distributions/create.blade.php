@extends('layouts.app')
@section('title', 'Tambah Penyaluran Bantuan')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-box-open me-2 text-primary"></i> Tambah Penyaluran Bantuan
            </div>
            <div class="card-body">
                <form action="{{ route('distributions.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="penerima_id" class="form-label-mokapos">Penerima Bantuan <span class="text-danger">*</span></label>
                        <select class="form-select form-control-mokapos @error('penerima_id') is-invalid @enderror" name="penerima_id">
                            <option value="">-- Pilih Penerima --</option>
                            @foreach($recipients as $r)
                                <option value="{{ $r->id }}" {{ old('penerima_id') == $r->id ? 'selected' : '' }}>
                                    {{ $r->nama }} - {{ $r->kategori_bantuan }}
                                </option>
                            @endforeach
                        </select>
                        @error('penerima_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="program_id" class="form-label-mokapos">Program Donasi <span class="text-danger">*</span></label>
                        <select class="form-select form-control-mokapos @error('program_id') is-invalid @enderror" name="program_id">
                            <option value="">-- Pilih Program --</option>
                            @foreach($programs as $prog)
                                <option value="{{ $prog->id }}" {{ old('program_id') == $prog->id ? 'selected' : '' }}>
                                    {{ $prog->nama_program }} (Terkumpul: Rp {{ number_format($prog->donasis->sum('nominal'), 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nominal" class="form-label-mokapos">Nominal (Rp) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control form-control-mokapos @error('nominal') is-invalid @enderror" 
                               name="nominal" value="{{ old('nominal') }}" placeholder="Masukkan nominal bantuan" min="0">
                        @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_penyaluran" class="form-label-mokapos">Tanggal Penyaluran <span class="text-danger">*</span></label>
                        <input type="date" class="form-control form-control-mokapos @error('tanggal_penyaluran') is-invalid @enderror" 
                               name="tanggal_penyaluran" value="{{ old('tanggal_penyaluran', date('Y-m-d')) }}">
                        @error('tanggal_penyaluran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label-mokapos">Keterangan</label>
                        <textarea class="form-control form-control-mokapos @error('keterangan') is-invalid @enderror" 
                                  name="keterangan" rows="3" placeholder="Catatan tambahan tentang penyaluran (opsional)">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('distributions.index') }}" class="btn btn-outline-mokapos">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection