@extends('layouts.app')
@section('title', 'Riwayat Donasi')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Riwayat Donasi</h1>
        <p class="section-subtitle">Pantau semua donasi yang telah Anda lakukan</p>
    </div>
    <a href="{{ route('donations.create') }}" class="btn btn-primary-mokapos">
        <i class="fas fa-hand-holding-heart me-2"></i> Donasi Baru
    </a>
</div>

<div class="card-mokapos">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-mokapos mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Program</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($donasis as $donasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
                        <td>
                            <a href="{{ route('donations.show', $donasi) }}" class="btn btn-sm btn-outline-mokapos">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if(auth()->user()->isAdmin() || auth()->id() == $donasi->user_id)
                                <form action="{{ route('donations.destroy', $donasi) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus donasi ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('donations.edit', $donasi) }}" class="btn btn-sm btn-primary-mokapos">
                                    <i class="fas fa-check"></i> Verifikasi
                                </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-hand-holding-usd fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada donasi. Mulai berdonasi sekarang!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection