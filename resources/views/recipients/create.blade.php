@extends('layouts.app')
@section('title', 'Tambah Penerima Bantuan')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-user-plus me-2 text-primary"></i> Tambah Penerima Bantuan
            </div>
            <div class="card-body">
                <form action="{{ route('recipients.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label-mokapos">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-mokapos @error('nama') is-invalid @enderror" 
                               name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap penerima">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label-mokapos">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-mokapos @error('alamat') is-invalid @enderror" 
                                  name="alamat" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label-mokapos">No. HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-mokapos @error('no_hp') is-invalid @enderror" 
                                   name="no_hp" value="{{ old('no_hp') }}" placeholder="08123456789">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kategori_bantuan" class="form-label-mokapos">Kategori Bantuan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-mokapos @error('kategori_bantuan') is-invalid @enderror" 
                                   name="kategori_bantuan" value="{{ old('kategori_bantuan') }}" placeholder="Sembako, Pendidikan, Kesehatan, dll">
                            @error('kategori_bantuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                        <a href="{{ route('recipients.index') }}" class="btn btn-outline-mokapos">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection