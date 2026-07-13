@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')

<!-- ===== HERO SECTION ===== -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1>Selamat datang, {{ auth()->user()->name }}! 👋</h1>
                <p class="lead">Kelola program donasi, verifikasi donasi, kelola penerima dan penyaluran bantuan dengan mudah.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('programs.create') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-plus-circle me-2"></i> Program Baru
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ===== STATISTIK ===== -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-ribbon"></i></div>
            <div class="stat-number">{{ \App\Models\ProgramDonasi::count() }}</div>
            <div class="stat-label">Total Program</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-hand-holding-usd"></i></div>
            <div class="stat-number">{{ \App\Models\Donasi::count() }}</div>
            <div class="stat-label">Total Donasi</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-number">{{ \App\Models\PenerimaBantuan::count() }}</div>
            <div class="stat-label">Total Penerima</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-boxes"></i></div>
            <div class="stat-number">{{ \App\Models\PenyaluranBantuan::count() }}</div>
            <div class="stat-label">Total Penyaluran</div>
        </div>
    </div>
</div>

<!-- ===== DONASI PENDING ===== -->
<div class="card-mokapos">
    <div class="card-header">
        <i class="fas fa-clock text-warning me-2"></i> Donasi Menunggu Verifikasi
    </div>
    <div class="card-body">
        @php
            $pendingDonasis = \App\Models\Donasi::where('status', 'pending')->with(['user', 'program'])->get();
        @endphp
        @if($pendingDonasis->count() > 0)
            <div class="table-responsive">
                <table class="table table-mokapos">
                    <thead>
                        <tr>
                            <th>Donatur</th>
                            <th>Program</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingDonasis as $donasi)
                        <tr>
                            <td>{{ $donasi->user->name }}</td>
                            <td>{{ $donasi->program->nama_program ?? '-' }}</td>
                            <td>Rp {{ number_format($donasi->nominal, 0, ',', '.') }}</td>
                            <td>{{ $donasi->tanggal_donasi->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('donations.edit', $donasi) }}" class="btn btn-sm btn-primary-mokapos">
                                    <i class="fas fa-check me-1"></i> Verifikasi
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted text-center mb-0">✨ Semua donasi sudah terverifikasi.</p>
        @endif
    </div>
</div>

@endsection