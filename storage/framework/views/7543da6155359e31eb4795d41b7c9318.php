

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">Edit Kategori</h2>

    <form action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">

            <label class="form-label">Nama Kategori</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="<?php echo e($category->name); ?>"
                   required>

        </div>

        <div class="mb-3">

    <label class="form-label">Deskripsi</label>

    <textarea
        name="description"
        class="form-control"
        rows="4"
        placeholder="Masukkan deskripsi kategori"><?php echo e(old('description', $category->description)); ?></textarea>

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

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="<?php echo e(route('admin.categories.index')); ?>"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>