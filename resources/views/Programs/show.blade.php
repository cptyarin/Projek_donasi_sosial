@extends('layouts.app')
@section('title', 'Detail Program: '.$program->nama_program)
@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $program->nama_program }}</h2>
    </div>
    <div class="card-body">
        @if($program->gambar)
            <img src="{{ asset('storage/'.$program->gambar) }}" class="img-fluid mb-3" style="max-height:400px;">
        @endif
        <p><strong>Deskripsi:</strong> {{ $program->deskripsi }}</p>
        <p><strong>Target Dana:</strong> Rp {{ number_format($program->target_dana, 0, ',', '.') }}</p>
        <p><strong>Dana Terkumpul:</strong> Rp {{ number_format($program->donasis->sum('nominal'), 0, ',', '.') }}</p>
        <p><strong>Periode:</strong> {{ $program->tanggal_mulai->format('d-m-Y') }} s.d. {{ $program->tanggal_selesai->format('d-m-Y') }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Kembali</a>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('programs.edit', $program) }}" class="btn btn-warning">Edit</a>
        @endif
    </div>
</div>

@if(auth()->user()->isAdmin())
    <div class="mt-4">
        <h4>Daftar Donasi untuk Program Ini</h4>
        <table class="table table-bordered">
            <thead><tr><th>Donatur</th><th>Nominal</th><th>Status</th></tr></thead>
            <tbody>
                @forelse($program->donasis as $donasi)
                    <tr>
                        <td>{{ $donasi->user->name }}</td>
                        <td>Rp {{ number_format($donasi->nominal, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($donasi->status) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">Belum ada donasi untuk program ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endif
@endsection