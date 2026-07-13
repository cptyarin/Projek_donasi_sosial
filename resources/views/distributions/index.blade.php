@extends('layouts.app')
@section('title', 'Penyaluran Bantuan')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Penyaluran Bantuan</h1>
        <p class="section-subtitle">Catat dan kelola penyaluran bantuan</p>
    </div>
    <a href="{{ route('distributions.create') }}" class="btn btn-primary-mokapos">
        <i class="fas fa-boxes me-2"></i> Tambah Penyaluran
    </a>
</div>

<div class="card-mokapos">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-mokapos mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Penerima</th>
                        <th>Program</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($distributions as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $d->penerima->nama ?? '-' }}</strong></td>
                        <td>{{ $d->program->nama_program ?? '-' }}</td>
                        <td><strong>Rp {{ number_format($d->nominal, 0, ',', '.') }}</strong></td>
                        <td>{{ $d->tanggal_penyaluran->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('distributions.show', $d) }}" class="btn btn-sm btn-outline-mokapos">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('distributions.edit', $d) }}" class="btn btn-sm btn-primary-mokapos">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('distributions.destroy', $d) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus penyaluran ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-boxes fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada penyaluran bantuan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection