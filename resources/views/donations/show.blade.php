@extends('layouts.app')
@section('title', 'Detail Donasi')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-info-circle me-2 text-primary"></i> Detail Donasi
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Program</div>
                    <div class="col-sm-8">{{ $donation->program->nama_program ?? '-' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Donatur</div>
                    <div class="col-sm-8">{{ $donation->user->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Nominal</div>
                    <div class="col-sm-8"><strong>Rp {{ number_format($donation->nominal, 0, ',', '.') }}</strong></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Tanggal Donasi</div>
                    <div class="col-sm-8">{{ $donation->tanggal_donasi->format('d-m-Y') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Status</div>
                    <div class="col-sm-8">
                        @if($donation->status == 'pending')
                            <span class="badge-status pending"><i class="fas fa-clock me-1"></i> Pending</span>
                        @elseif($donation->status == 'verified')
                            <span class="badge-status verified"><i class="fas fa-check-circle me-1"></i> Verified</span>
                        @else
                            <span class="badge-status rejected"><i class="fas fa-times-circle me-1"></i> Rejected</span>
                        @endif
                    </div>
                </div>
                @if($donation->bukti_transfer)
                <div class="row mb-3">
                    <div class="col-sm-4 fw-bold">Bukti Transfer</div>
                    <div class="col-sm-8">
                        <img src="{{ asset('storage/'.$donation->bukti_transfer) }}" style="max-height:250px;" class="img-fluid rounded">
                    </div>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('donations.index') }}" class="btn btn-outline-mokapos">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('donations.edit', $donation) }}" class="btn btn-primary-mokapos">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection