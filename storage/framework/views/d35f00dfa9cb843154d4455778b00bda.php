

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">Tambah Produk</h2>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <form action="<?php echo e(route('admin.products.store')); ?>"
      method="POST"
      enctype="multipart/form-data">

        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>Kategori</label>

            <select name="category_id" class="form-control">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($category->id); ?>">
                        <?php echo e($category->name); ?>

                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">

    <label class="form-label">
        Brand
    </label>

    <input type="text"
           name="brand"
           class="form-control"
           placeholder="Contoh: Nike, Adidas, Uniqlo"
           value="<?php echo e(old('brand')); ?>"
           required>

</div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control">
        </div>

        <div class="mb-3">
    <label>Ukuran <small class="text-muted">(Opsional)</small></label>

    <input type="text"
           name="size"
           class="form-control"
           placeholder="Contoh: L, XL, 42 (boleh dikosongkan)"
           value="<?php echo e(old('size')); ?>">
</div>

        <div class="mb-3">
            <label>Kondisi</label>
            <input type="text" name="condition" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">

    <label>Foto Produk</label>

    <input
        type="file"
        name="image"
        class="form-control">

</div>

        <button class="btn btn-success">
            Simpan Produk
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/products/create.blade.php ENDPATH**/ ?>