@extends('layouts.app')
@section('title', 'Edit Profil')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-user-cog me-2 text-primary"></i> Edit Profil
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label-mokapos">Nama</label>
                        <input type="text" class="form-control form-control-mokapos @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name', $user->name) }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label-mokapos">Email</label>
                        <input type="email" class="form-control form-control-mokapos @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email', $user->email) }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label-mokapos">Password Baru <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                        <input type="password" class="form-control form-control-mokapos @error('password') is-invalid @enderror" 
                               name="password">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label-mokapos">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control form-control-mokapos" name="password_confirmation">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-save me-2"></i> Update Profil
                        </button>
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-mokapos">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection