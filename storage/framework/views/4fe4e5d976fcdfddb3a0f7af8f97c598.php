

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">Edit Produk</h2>

    <form action="<?php echo e(route('admin.products.update', $product->id)); ?>"
          method="POST"
          enctype="multipart/form-data">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Kategori</label>

            <select name="category_id" class="form-control">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($category->id); ?>"
                        <?php echo e($category->id == $product->category_id ? 'selected' : ''); ?>>

                        <?php echo e($category->name); ?>


                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>

        </div>

        <div class="mb-3">
            <label>Nama Produk</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="<?php echo e($product->name); ?>">
        </div>

        <div class="mb-3">

    <label class="form-label">
        Brand
    </label>

    <input type="text"
           name="brand"
           class="form-control"
           value="<?php echo e(old('brand', $product->brand)); ?>"
           required>

</div>

        <div class="mb-3">
            <label>Harga</label>

            <input type="number"
                   name="price"
                   class="form-control"
                   value="<?php echo e($product->price); ?>">
        </div>

        <div class="mb-3">
            <label>Stok</label>

            <input type="number"
                   name="stock"
                   class="form-control"
                   value="<?php echo e($product->stock); ?>">
        </div>

        <div class="mb-3">

    <label>Ukuran <small class="text-muted">(Opsional)</small></label>

    <input type="text"
           name="size"
           class="form-control"
           placeholder="Contoh: L, XL, 42 (boleh dikosongkan)"
           value="<?php echo e(old('size', $product->size)); ?>">

</div>

        <div class="mb-3">
            <label>Kondisi</label>

            <input type="text"
                   name="condition"
                   class="form-control"
                   value="<?php echo e($product->condition); ?>">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>

            <textarea name="description"
                      class="form-control"
                      rows="4"><?php echo e($product->description); ?></textarea>
        </div>

        <div class="mb-3">

            <label>Gambar</label>

            <br>

            <img src="<?php echo e(asset('products/'.$product->image)); ?>"
                 width="120"
                 class="mb-3">

            <input type="file"
                   name="image"
                   class="form-control">

        </div>

        <button class="btn btn-success">
            Update Produk
        </button>

        <a href="<?php echo e(route('admin.products.index')); ?>"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>