<?php $__env->startSection('title', 'Donasi Baru'); ?>
<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-mokapos">
            <div class="card-header">
                <i class="fas fa-hand-holding-heart me-2 text-success"></i> Form Donasi
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('donations.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="program_id" class="form-label-mokapos">Pilih Program Donasi <span class="text-danger">*</span></label>
                        <select class="form-select form-control-mokapos <?php $__errorArgs = ['program_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="program_id">
                            <option value="">-- Pilih Program --</option>
                            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($prog->id); ?>" <?php echo e(old('program_id') == $prog->id ? 'selected' : ''); ?>>
                                    <?php echo e($prog->nama_program); ?> (Target: Rp <?php echo e(number_format($prog->target_dana, 0, ',', '.')); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['program_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="nominal" class="form-label-mokapos">Nominal Donasi (Rp) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control form-control-mokapos <?php $__errorArgs = ['nominal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               name="nominal" value="<?php echo e(old('nominal')); ?>" placeholder="Masukkan nominal donasi" min="1">
                        <?php $__errorArgs = ['nominal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_donasi" class="form-label-mokapos">Tanggal Donasi <span class="text-danger">*</span></label>
                        <input type="date" class="form-control form-control-mokapos <?php $__errorArgs = ['tanggal_donasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               name="tanggal_donasi" value="<?php echo e(old('tanggal_donasi', date('Y-m-d'))); ?>">
                        <?php $__errorArgs = ['tanggal_donasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="bukti_transfer" class="form-label-mokapos">Bukti Transfer</label>
                        <input type="file" class="form-control form-control-mokapos <?php $__errorArgs = ['bukti_transfer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               name="bukti_transfer" accept="image/*">
                        <small class="text-muted">Upload bukti transfer untuk verifikasi (opsional)</small>
                        <?php $__errorArgs = ['bukti_transfer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> 
                        Donasi Anda akan masuk dalam status <strong>Pending</strong> dan akan diverifikasi oleh admin.
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary-mokapos">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Donasi
                        </button>
                        <a href="<?php echo e(route('donations.index')); ?>" class="btn btn-outline-mokapos">
                            <i class="fas fa-arrow-left me-2"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\donasi-app\resources\views/donations/create.blade.php ENDPATH**/ ?>