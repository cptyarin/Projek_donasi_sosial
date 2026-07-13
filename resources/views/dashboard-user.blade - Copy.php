@extends('layouts.app')
@section('title', 'Tentang Kami - DonasiSosial')
@section('content')

<!-- ===== HERO ABOUT ===== -->
<div class="hero-section" style="background: linear-gradient(135deg, #005290 0%, #003d6b 100%); border-radius: 0 0 40px 40px; padding: 60px 0 80px;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Tentang DonasiSosial</h1>
                <p class="lead">Platform donasi dan bantuan sosial berbasis web untuk membantu sesama dengan transparansi dan kemudahan.</p>
            </div>
        </div>
    </div>
</div>

<!-- ===== VISI & MISI ===== -->
<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="card-mokapos h-100">
            <div class="card-body text-center">
                <div class="mb-3" style="font-size: 3rem; color: var(--primary);">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="card-title">Visi</h3>
                <p class="card-text" style="font-size: 1.1rem;">
                    Menjadi platform donasi terpercaya yang menghubungkan hati para donatur dengan mereka yang membutuhkan, menciptakan perubahan sosial yang berkelanjutan.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-mokapos h-100">
            <div class="card-body text-center">
                <div class="mb-3" style="font-size: 3rem; color: var(--primary);">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="card-title">Misi</h3>
                <ul class="text-start" style="list-style: none; padding-left: 0;">
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Memudahkan proses donasi secara digital</li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Menjamin transparansi penyaluran bantuan</li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Memberdayakan masyarakat untuk saling membantu</li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i> Menjaga integritas dan kepercayaan donatur</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- ===== TUJUAN ===== -->
<div class="card-mokapos mb-5">
    <div class="card-header">
        <i class="fas fa-flag-checkered text-primary me-2"></i> Tujuan Kami
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <div style="font-size: 2.5rem; color: var(--primary);"><i class="fas fa-hand-holding-heart"></i></div>
                    <h5>Memperluas Jangkauan</h5>
                    <p class="text-muted">Menjangkau lebih banyak penerima manfaat di seluruh Indonesia.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <div style="font-size: 2.5rem; color: var(--primary);"><i class="fas fa-chart-line"></i></div>
                    <h5>Meningkatkan Efisiensi</h5>
                    <p class="text-muted">Mengoptimalkan proses donasi dengan teknologi modern.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <div style="font-size: 2.5rem; color: var(--primary);"><i class="fas fa-users"></i></div>
                    <h5>Membangun Komunitas</h5>
                    <p class="text-muted">Menciptakan ekosistem kepedulian yang kuat dan berkelanjutan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== NILAI-NILAI ===== -->
<div class="card-mokapos mb-5">
    <div class="card-header">
        <i class="fas fa-gem text-primary me-2"></i> Nilai-Nilai Kami
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="text-center p-3 border rounded-3" style="background: var(--primary-light);">
                    <div style="font-size: 2rem; color: var(--primary);"><i class="fas fa-shield-alt"></i></div>
                    <h6>Transparansi</h6>
                    <small class="text-muted">Setiap donasi tercatat dan dapat dilacak.</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center p-3 border rounded-3" style="background: var(--primary-light);">
                    <div style="font-size: 2rem; color: var(--primary);"><i class="fas fa-handshake"></i></div>
                    <h6>Integritas</h6>
                    <small class="text-muted">Menjaga kepercayaan dengan komitmen tinggi.</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center p-3 border rounded-3" style="background: var(--primary-light);">
                    <div style="font-size: 2rem; color: var(--primary);"><i class="fas fa-heart"></i></div>
                    <h6>Empati</h6>
                    <small class="text-muted">Mengedepankan kepedulian terhadap sesama.</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center p-3 border rounded-3" style="background: var(--primary-light);">
                    <div style="font-size: 2rem; color: var(--primary);"><i class="fas fa-rocket"></i></div>
                    <h6>Inovasi</h6>
                    <small class="text-muted">Terus berinovasi untuk memberikan dampak lebih besar.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== TIM & SEJARAH ===== -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="card-mokapos h-100">
            <div class="card-header">
                <i class="fas fa-users text-primary me-2"></i> Tim Kami
            </div>
            <div class="card-body">
                <p>DonasiSosial didirikan oleh sekelompok pengembang dan aktivis sosial yang berkomitmen untuk memanfaatkan teknologi guna membantu sesama.</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-user-circle text-primary me-2"></i> <strong>Tim Pengembang</strong> – Membangun platform dengan teknologi terbaik.</li>
                    <li><i class="fas fa-user-circle text-primary me-2"></i> <strong>Tim Relawan</strong> – Mengelola program dan penyaluran bantuan.</li>
                    <li><i class="fas fa-user-circle text-primary me-2"></i> <strong>Tim Verifikasi</strong> – Menjaga keakuratan dan transparansi donasi.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-mokapos h-100">
            <div class="card-header">
                <i class="fas fa-history text-primary me-2"></i> Sejarah
            </div>
            <div class="card-body">
                <p>DonasiSosial lahir dari keprihatinan terhadap maraknya kegiatan donasi yang kurang transparan. Pada tahun 2025, kami memulai perjalanan untuk menciptakan platform donasi yang terbuka, akuntabel, dan mudah digunakan oleh semua kalangan.</p>
                <p>Hingga saat ini, DonasiSosial telah membantu ribuan penerima manfaat dan terus berkembang untuk menjangkau lebih banyak masyarakat.</p>
            </div>
        </div>
    </div>
</div>

<!-- ===== CALL TO ACTION ===== -->
<div class="text-center mt-5 p-5" style="background: var(--primary-light); border-radius: 16px;">
    <h3 class="fw-bold">Siap berdonasi dan membantu sesama?</h3>
    <p class="text-muted">Mulai langkah kecil Anda untuk perubahan besar.</p>
    <a href="{{ route('donations.create') }}" class="btn btn-primary-mokapos btn-lg">
        <i class="fas fa-hand-holding-heart me-2"></i> Donasi Sekarang
    </a>
</div>

@endsection