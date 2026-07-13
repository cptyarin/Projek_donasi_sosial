@extends('layouts.app')
@section('title', 'Program Donasi')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Program Donasi</h1>
        <p class="section-subtitle">Bantu sesama melalui program donasi yang tersedia</p>
    </div>
    @if(auth()->user()->isAdmin())
        <a href="{{ route('programs.create') }}" class="btn btn-primary-mokapos">
            <i class="fas fa-plus-circle me-2"></i> Tambah Program
        </a>
    @endif
</div>

<div class="row g-4">
    @forelse($programs as $program)
        <div class="col-md-4">
            <div class="card-mokapos h-100">
                @if($program->gambar)
                    <img src="{{ asset('storage/'.$program->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                @else
                    <div class="bg-primary-light d-flex align-items-center justify-content-center" style="height:200px; color: var(--primary);">
                        <i class="fas fa-ribbon fa-4x"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $program->nama_program }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($program->deskripsi, 100) }}</p>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Target</small>
                            <strong>Rp {{ number_format($program->target_dana, 0, ',', '.') }}</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Terkumpul</small>
                            <strong class="text-primary">Rp {{ number_format($program->donasis->sum('nominal'), 0, ',', '.') }}</strong>
                        </div>
                        <div class="progress mt-1" style="height:6px;">
                            @php
                                $persentase = $program->target_dana > 0 ? ($program->donasis->sum('nominal') / $program->target_dana) * 100 : 0;
                            @endphp
                            <div class="progress-bar bg-primary" style="width: {{ min($persentase, 100) }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 pb-3">
                    <a href="{{ route('programs.show', $program) }}" class="btn btn-primary-mokapos btn-sm w-100">
                        <i class="fas fa-eye me-2"></i> Detail
                    </a>
                    @if(auth()->user()->isAdmin())
                        <div class="mt-2 d-flex gap-2">
                            <a href="{{ route('programs.edit', $program) }}" class="btn btn-outline-mokapos btn-sm flex-grow-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('programs.destroy', $program) }}" method="POST" class="flex-grow-1">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Yakin hapus program ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-ribbon fa-4x text-muted mb-3 d-block"></i>
            <h4>Belum ada program donasi</h4>
            <p class="text-muted">Mulai program donasi pertama Anda sekarang!</p>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('programs.create') }}" class="btn btn-primary-mokapos">Tambah Program</a>
            @endif
        </div>
    @endforelse
</div>

@endsection