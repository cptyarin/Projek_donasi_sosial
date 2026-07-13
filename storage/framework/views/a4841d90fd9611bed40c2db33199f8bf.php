<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Sistem Donasi Sosial'); ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Font: Inter (mirip Silka) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #005290;
            --primary-dark: #003d6b;
            --primary-light: #e8f0fe;
            --secondary: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        /* ===== NAVBAR STYLE MOKAPOS ===== */
        .navbar-mokapos {
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            padding: 12px 0;
        }

        .navbar-mokapos .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .navbar-mokapos .navbar-brand i {
            color: var(--primary);
            margin-right: 8px;
        }

        .navbar-mokapos .nav-link {
            font-weight: 500;
            color: #4a5568;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .navbar-mokapos .nav-link:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .navbar-mokapos .nav-link.active {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary-mokapos {
            background-color: var(--primary);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary-mokapos:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 82, 144, 0.3);
        }

        .btn-outline-mokapos {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-outline-mokapos:hover {
            background: var(--primary);
            color: white;
        }

        /* ===== CARD STYLE ===== */
        .card-mokapos {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s;
            overflow: hidden;
        }

        .card-mokapos:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0, 82, 144, 0.12);
        }

        .card-mokapos .card-header {
            background: white;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px 24px;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .card-mokapos .card-body {
            padding: 24px;
        }

        /* ===== STATISTIK ===== */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0, 82, 144, 0.12);
        }

        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
        }

        .stat-card .stat-label {
            color: #6c757d;
            font-weight: 500;
            margin-top: 4px;
        }

        .stat-card .stat-icon {
            font-size: 2rem;
            color: var(--primary-light);
            margin-bottom: 8px;
        }

        /* ===== TABEL ===== */
        .table-mokapos {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .table-mokapos thead {
            background: var(--primary);
            color: white;
        }

        .table-mokapos thead th {
            padding: 16px 20px;
            font-weight: 600;
            border: none;
        }

        .table-mokapos tbody td {
            padding: 14px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .table-mokapos tbody tr:hover {
            background-color: var(--primary-light);
        }

        /* ===== BADGE ===== */
        .badge-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-status.verified {
            background: #d4edda;
            color: #155724;
        }

        .badge-status.rejected {
            background: #f8d7da;
            color: #721c24;
        }

        /* ===== FORM ===== */
        .form-control-mokapos {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            transition: all 0.3s;
        }

        .form-control-mokapos:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 82, 144, 0.1);
        }

        .form-label-mokapos {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 6px;
        }

        /* ===== FOOTER ===== */
        .footer-mokapos {
            background: #1a202c;
            color: #a0aec0;
            padding: 40px 0 20px;
            margin-top: 60px;
        }

        .footer-mokapos h5 {
            color: white;
            font-weight: 700;
        }

        .footer-mokapos a {
            color: #a0aec0;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-mokapos a:hover {
            color: white;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }

        /* ===== HERO ===== */
        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 60px 0 80px;
            border-radius: 0 0 40px 40px;
            margin-bottom: 40px;
            color: white;
        }

        .hero-section h1 {
            font-weight: 800;
            font-size: 3rem;
        }

        .hero-section .lead {
            font-size: 1.2rem;
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-mokapos">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/dashboard')); ?>">
                <i class="fas fa-hand-holding-heart"></i> DonasiSosial
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('programs.*') ? 'active' : ''); ?>" 
                           href="<?php echo e(route('programs.index')); ?>">
                            <i class="fas fa-ribbon me-1"></i> Program
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('donations.*') ? 'active' : ''); ?>" 
                           href="<?php echo e(route('donations.index')); ?>">
                            <i class="fas fa-hand-holding-usd me-1"></i> Donasi
                        </a>
                    </li>
                    <!-- ===== TAMBAHAN: TENTANG KAMI ===== -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" 
                           href="<?php echo e(route('about')); ?>">
                            <i class="fas fa-info-circle me-1"></i> Tentang Kami
                        </a>
                    </li>
                    <!-- ===== SAMPAI SINI ===== -->
                    <?php if(auth()->user()->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('recipients.*') ? 'active' : ''); ?>" 
                               href="<?php echo e(route('recipients.index')); ?>">
                                <i class="fas fa-users me-1"></i> Penerima
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('distributions.*') ? 'active' : ''); ?>" 
                               href="<?php echo e(route('distributions.index')); ?>">
                                <i class="fas fa-boxes me-1"></i> Penyaluran
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> <?php echo e(auth()->user()->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                                <i class="fas fa-user me-2"></i> Profil
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== CONTENT ===== -->
    <main>
        <div class="container">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer-mokapos">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-hand-holding-heart me-2"></i>DonasiSosial</h5>
                    <p>Sistem donasi dan bantuan sosial berbasis web untuk membantu sesama.</p>
                </div>
                <div class="col-md-4">
                    <h5>Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('programs.index')); ?>">Program</a></li>
                        <li><a href="<?php echo e(route('donations.index')); ?>">Donasi</a></li>
                        <li><a href="<?php echo e(route('about')); ?>">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-envelope me-2"></i> info@donasisosial.com</p>
                    <p><i class="fas fa-phone me-2"></i> +62 812-3456-7890</p>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center">
                <small>&copy; <?php echo e(date('Y')); ?> DonasiSosial. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\donasi-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>