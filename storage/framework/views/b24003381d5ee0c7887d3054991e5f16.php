<?php $__env->startSection('title', 'Riwayat Donasi'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Riwayat Donasi</h1>
        <p class="section-subtitle">Pantau semua donasi yang telah Anda lakukan</p>
    </div>
    <a href="<?php echo e(route('donations.create')); ?>" class="btn btn-primary-mokapos">
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
                    <?php $__empty_1 = true; $__currentLoopData = $donasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($donasi->program->nama_program ?? '-'); ?></td>
                        <td><strong>Rp <?php echo e(number_format($donasi->nominal, 0, ',', '.')); ?></strong></td>
                        <td><?php echo e($donasi->tanggal_donasi->format('d-m-Y')); ?></td>
                        <td>
                            <?php if($donasi->status == 'pending'): ?>
                                <span class="badge-status pending"><i class="fas fa-clock me-1"></i> Pending</span>
                            <?php elseif($donasi->status == 'verified'): ?>
                                <span class="badge-status verified"><i class="fas fa-check-circle me-1"></i> Verified</span>
                            <?php else: ?>
                                <span class="badge-status rejected"><i class="fas fa-times-circle me-1"></i> Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('donations.show', $donasi)); ?>" class="btn btn-sm btn-outline-mokapos">
                                <i class="fas fa-eye"></i>
                            </a>
                            <?php if(auth()->user()->isAdmin() || auth()->id() == $donasi->user_id): ?>
                                <form action="<?php echo e(route('donations.destroy', $donasi)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus donasi ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <a href="<?php echo e(route('donations.edit', $donasi)); ?>" class="btn btn-sm btn-primary-mokapos">
                                    <i class="fas fa-check"></i> Verifikasi
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-hand-holding-usd fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada donasi. Mulai berdonasi sekarang!</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\donasi-app\resources\views/donations/index.blade.php ENDPATH**/ ?>