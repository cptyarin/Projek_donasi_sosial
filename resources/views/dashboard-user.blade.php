@extends('layouts.app')
@section('title', 'Dashboard User')
@section('content')

<!-- ===== HERO SECTION ===== -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1>Halo, {{ auth()->user()->name }}! 👋</h1>
                <p class="lead">Lihat program donasi, lakukan donasi, dan pantau riwayat donasi Anda.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('donations.create') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-hand-holding-heart me-2"></i> Donasi Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ===== STATISTIK ===== -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-coins"></i></div>
            <div class="stat-number">Rp {{ number_format(\App\Models\Donasi::where('user_id', auth()->id())->sum('nominal'), 0, ',', '.') }}</div>
            <div class="stat-label">Total Donasi Anda</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
            <div class="stat-number">{{ \App\Models\ProgramDonasi::where('tanggal_selesai', '>=', now())->count() }}</div>
            <div class="stat-label">Program Aktif</div>
        </div>
    </div>
</div>

<!-- ===== PROGRAM AKTIF ===== -->
<div class="card-mokapos">
    <div class="card-header">
        <i class="fas fa-ribbon text-primary me-2"></i> Program Donasi Aktif
    </div>
    <div class="card-body">
        @php
            $activePrograms = \App\Models\ProgramDonasi::where('tanggal_selesai', '>=', now())->take(3)->get();
        @endphp
        <div class="row">
            @forelse($activePrograms as $program)
                <div class="col-md-4">
                    <div class="card-mokapos h-100">
                        @if($program->gambar)
                            <img src="{{ asset('storage/'.$program->gambar) }}" class="card-img-top" style="height:180px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $program->nama_program }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($program->deskripsi, 80) }}</p>
                            <p><strong>Target:</strong> Rp {{ number_format($program->target_dana, 0, ',', '.') }}</p>
                            <a href="{{ route('programs.show', $program) }}" class="btn btn-primary-mokapos btn-sm w-100">
                                <i class="fas fa-eye me-2"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center py-4">Belum ada program donasi aktif.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- ===== RIWAYAT DONASI TERAKHIR ===== -->
<div class="card-mokapos mt-4">
    <div class="card-header">
        <i class="fas fa-clock text-info me-2"></i> Riwayat Donasi Terakhir
    </div>
    <div class="card-body p-0">
        @php
            $recentDonations = \App\Models\Donasi::where('user_id', auth()->id())
                                ->with('program')
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
        @endphp
        @if($recentDonations->count() > 0)
            <div class="table-responsive">
                <table class="table table-mokapos mb-0">
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentDonations as $donasi)
                        <tr>
                            <td>{{ $donasi->program->nama_program ?? '-' }}</td>
                            <td><strong>Rp {{ number_format($donasi->nominal, 0, ',', '.') }}</strong></td>
                            <td>{{ $donasi->tanggal_donasi->format('d-m-Y') }}</td>
                            <td>
                                @if($donasi->status == 'pending')
                                    <span class="badge-status pending"><i class="fas fa-clock me-1"></i> Pending</span>
                                @elseif($donasi->status == 'verified')
                                    <span class="badge-status verified"><i class="fas fa-check-circle me-1"></i> Verified</span>
                                @else
                                    <span class="badge-status rejected"><i class="fas fa-times-circle me-1"></i> Rejected</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted text-center py-4">Anda belum melakukan donasi. <a href="{{ route('donations.create') }}">Donasi sekarang!</a></p>
        @endif
    </div>
</div>

@endsection