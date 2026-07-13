@extends('layouts.app')
@section('title', 'Penerima Bantuan')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Penerima Bantuan</h1>
        <p class="section-subtitle">Kelola data penerima bantuan</p>
    </div>
    <a href="{{ route('recipients.create') }}" class="btn btn-primary-mokapos">
        <i class="fas fa-user-plus me-2"></i> Tambah Penerima
    </a>
</div>

<div class="card-mokapos">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-mokapos mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recipients as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $r->nama }}</strong></td>
                        <td>{{ Str::limit($r->alamat, 30) }}</td>
                        <td>{{ $r->no_hp }}</td>
                        <td><span class="badge bg-primary-light text-primary">{{ $r->kategori_bantuan }}</span></td>
                        <td>
                            <a href="{{ route('recipients.show', $r) }}" class="btn btn-sm btn-outline-mokapos">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('recipients.edit', $r) }}" class="btn btn-sm btn-primary-mokapos">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('recipients.destroy', $r) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus penerima ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada penerima bantuan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection