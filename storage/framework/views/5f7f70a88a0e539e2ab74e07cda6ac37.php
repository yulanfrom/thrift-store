

<?php $__env->startSection('content'); ?>

<div class="container">

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Kelola Produk</h2>

        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">
            + Tambah Produk
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Brand</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="180">Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr>

                <td><?php echo e($loop->iteration); ?></td>

                <td>
                    <img src="<?php echo e(asset('products/'.$product->image)); ?>"
                         width="80"
                         height="80"
                         style="object-fit:cover;">
                </td>

                <td><?php echo e($product->name); ?></td>

                <td><?php echo e($product->brand); ?></td>

                <td>
                    Rp <?php echo e(number_format($product->price,0,',','.')); ?>

                </td>

                <td><?php echo e($product->stock); ?></td>

                <td>

                    <a href="<?php echo e(route('admin.products.show', $product->id)); ?>"
                        class="btn btn-info btn-sm">
                         Detail
                    </a>

                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>"
                          method="POST"
                          style="display:inline;">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>

                <td colspan="7" class="text-center">
                    Belum ada produk.
                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/products/index.blade.php ENDPATH**/ ?>