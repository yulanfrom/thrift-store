

<?php $__env->startSection('content'); ?>

<div class="container py-5">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">
                <i class="bi bi-folder-plus"></i> Tambah Kategori
            </h4>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">

                <?php echo csrf_field(); ?>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Kategori
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="Masukkan nama kategori"
                           value="<?php echo e(old('name')); ?>"
                           required>

                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <div class="mb-3">

    <label class="form-label">Deskripsi</label>

    <textarea
        name="description"
        class="form-control"
        rows="4"
        placeholder="Contoh: Berisi berbagai jenis hijab seperti pashmina, segi empat, bergo, dan instan."><?php echo e(old('description')); ?></textarea>

    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text-danger">
            <?php echo e($message); ?>

        </small>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Simpan
                </button>

                <a href="<?php echo e(route('admin.categories.index')); ?>"
                   class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>