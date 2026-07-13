<?php $__env->startSection('title', 'Penerima Bantuan'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Penerima Bantuan</h1>
        <p class="section-subtitle">Kelola data penerima bantuan</p>
    </div>
    <a href="<?php echo e(route('recipients.create')); ?>" class="btn btn-primary-mokapos">
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
                    <?php $__empty_1 = true; $__currentLoopData = $recipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><strong><?php echo e($r->nama); ?></strong></td>
                        <td><?php echo e(Str::limit($r->alamat, 30)); ?></td>
                        <td><?php echo e($r->no_hp); ?></td>
                        <td><span class="badge bg-primary-light text-primary"><?php echo e($r->kategori_bantuan); ?></span></td>
                        <td>
                            <a href="<?php echo e(route('recipients.show', $r)); ?>" class="btn btn-sm btn-outline-mokapos">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('recipients.edit', $r)); ?>" class="btn btn-sm btn-primary-mokapos">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('recipients.destroy', $r)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus penerima ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada penerima bantuan.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\donasi-app\resources\views/recipients/index.blade.php ENDPATH**/ ?>