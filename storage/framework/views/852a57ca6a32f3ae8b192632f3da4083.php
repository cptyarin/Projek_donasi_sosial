<?php $__env->startSection('title', 'Detail Program: '.$program->nama_program); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h2><?php echo e($program->nama_program); ?></h2>
    </div>
    <div class="card-body">
        <?php if($program->gambar): ?>
            <img src="<?php echo e(asset('storage/'.$program->gambar)); ?>" class="img-fluid mb-3" style="max-height:400px;">
        <?php endif; ?>
        <p><strong>Deskripsi:</strong> <?php echo e($program->deskripsi); ?></p>
        <p><strong>Target Dana:</strong> Rp <?php echo e(number_format($program->target_dana, 0, ',', '.')); ?></p>
        <p><strong>Dana Terkumpul:</strong> Rp <?php echo e(number_format($program->donasis->sum('nominal'), 0, ',', '.')); ?></p>
        <p><strong>Periode:</strong> <?php echo e($program->tanggal_mulai->format('d-m-Y')); ?> s.d. <?php echo e($program->tanggal_selesai->format('d-m-Y')); ?></p>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-secondary">Kembali</a>
        <?php if(auth()->user()->isAdmin()): ?>
            <a href="<?php echo e(route('programs.edit', $program)); ?>" class="btn btn-warning">Edit</a>
        <?php endif; ?>
    </div>
</div>

<?php if(auth()->user()->isAdmin()): ?>
    <div class="mt-4">
        <h4>Daftar Donasi untuk Program Ini</h4>
        <table class="table table-bordered">
            <thead><tr><th>Donatur</th><th>Nominal</th><th>Status</th></tr></thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $program->donasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($donasi->user->name); ?></td>
                        <td>Rp <?php echo e(number_format($donasi->nominal, 0, ',', '.')); ?></td>
                        <td><?php echo e(ucfirst($donasi->status)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="3">Belum ada donasi untuk program ini.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\donasi-app\resources\views/programs/show.blade.php ENDPATH**/ ?>