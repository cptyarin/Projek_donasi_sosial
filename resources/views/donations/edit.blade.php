@extends('layouts.app')
@section('title', 'Edit Donasi')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-edit me-2 text-warning"></i> Edit Donasi
            </div>
            <div class="card-body">
                <form action="{{ route('donations.update', $donation) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="program_id" class="form-label-mokapos">Program Donasi <span class="text-danger">*</span></label>
                        <select class="form-select form-control-mokapos @error('program_id') is-invalid @enderror" name="program_id">
                            @foreach($programs as $prog)
                                <option value="{{ $prog->id }}" {{ old('program_id', $donation->program_id) == $prog->id ? 'selected' : '' }}>
                                    {{ $prog->nama_program }}
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
                               name="nominal" value="{{ old('nominal', $donation->nominal) }}" placeholder="Masukkan nominal donasi" min="1">
                        @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_donasi" class="form-label-mokapos">Tanggal Donasi <span class="text-danger">*</span></label>
                        <input type="date" class="form-control form-control-mokapos @error('tanggal_donasi') is-invalid @enderror" 
                               name="tanggal_donasi" value="{{ old('tanggal_donasi', $donation->tanggal_donasi->format('Y-m-d')) }}">
                        @error('tanggal_donasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label-mokapos">Status <span class="text-danger">*</span></label>
                        <select class="form-select form-control-mokapos @error('status') is-invalid @enderror" name="status">
                            <option value="pending" {{ old('status', $donation->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="verified" {{ old('status', $donation->status) == 'verified' ? 'selected' : '' }}>Verified</option>
                            <option value="rejected" {{ old('status', $donation->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bukti_transfer" class="form-label-mokapos">Bukti Transfer</label>
                        @if($donation->bukti_transfer)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$donation->bukti_transfer) }}" style="max-height:100px;" class="rounded border">
                                <small class="d-block text-muted">Bukti saat ini</small>
                            </div>
                        @endif
                        <input type="file" class="form-control form-control-mokapos @error('bukti_transfer') is-invalid @enderror" 
                               name="bukti_transfer" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah bukti</small>
                        @error('bukti_transfer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-save me-2"></i> Update
                        </button>
                        <a href="{{ route('donations.index') }}" class="btn btn-outline-mokapos">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection