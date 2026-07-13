@extends('layouts.app')
@section('title', 'Tambah Program Donasi')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-plus-circle me-2 text-primary"></i> Tambah Program Donasi
            </div>
            <div class="card-body">
                <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_program" class="form-label-mokapos">Nama Program <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-mokapos @error('nama_program') is-invalid @enderror" 
                               name="nama_program" value="{{ old('nama_program') }}" placeholder="Masukkan nama program donasi">
                        @error('nama_program')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label-mokapos">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-mokapos @error('deskripsi') is-invalid @enderror" 
                                  name="deskripsi" rows="4" placeholder="Jelaskan tujuan dan manfaat program donasi ini">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="target_dana" class="form-label-mokapos">Target Dana (Rp) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control form-control-mokapos @error('target_dana') is-invalid @enderror" 
                                   name="target_dana" value="{{ old('target_dana') }}" placeholder="0">
                            @error('target_dana')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gambar" class="form-label-mokapos">Gambar</label>
                            <input type="file" class="form-control form-control-mokapos @error('gambar') is-invalid @enderror" 
                                   name="gambar" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, JPEG. Maks 2MB</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_mulai" class="form-label-mokapos">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-mokapos @error('tanggal_mulai') is-invalid @enderror" 
                                   name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_selesai" class="form-label-mokapos">Tanggal Selesai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-mokapos @error('tanggal_selesai') is-invalid @enderror" 
                                   name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('programs.index') }}" class="btn btn-outline-mokapos">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection