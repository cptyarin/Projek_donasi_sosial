<?php $__env->startSection('title', 'Penyaluran Bantuan'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Penyaluran Bantuan</h1>
        <p class="section-subtitle">Catat dan kelola penyaluran bantuan</p>
    </div>
    <a href="<?php echo e(route('distributions.create')); ?>" class="btn btn-primary-mokapos">
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
                    <?php $__empty_1 = true; $__currentLoopData = $distributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><strong><?php echo e($d->penerima->nama ?? '-'); ?></strong></td>
                        <td><?php echo e($d->program->nama_program ?? '-'); ?></td>
                        <td><strong>Rp <?php echo e(number_format($d->nominal, 0, ',', '.')); ?></strong></td>
                        <td><?php echo e($d->tanggal_penyaluran->format('d-m-Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('distributions.show', $d)); ?>" class="btn btn-sm btn-outline-mokapos">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('distributions.edit', $d)); ?>" class="btn btn-sm btn-primary-mokapos">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('distributions.destroy', $d)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus penyaluran ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-boxes fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada penyaluran bantuan.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\donasi-app\resources\views/distributions/index.blade.php ENDPATH**/ ?>