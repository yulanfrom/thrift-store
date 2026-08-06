

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">Detail Produk</h2>

    <div class="card p-4">

        <div class="text-center mb-4">
            <img src="<?php echo e(asset('products/'.$product->image)); ?>"
                 width="250"
                 class="img-thumbnail">
        </div>

        <table class="table">

            <tr>
                <th width="200">Nama Produk</th>
                <td><?php echo e($product->name); ?></td>
            </tr>

            <tr>
                <th>Brand</th>
                <td><?php echo e($product->brand); ?></td>
            </tr>

            <tr>
                <th>Kategori</th>
                <td><?php echo e($product->category->name); ?></td>
            </tr>

            <tr>
                <th>Harga</th>
                <td>Rp <?php echo e(number_format($product->price,0,',','.')); ?></td>
            </tr>

            <tr>
                <th>Stok</th>
                <td><?php echo e($product->stock); ?></td>
            </tr>

            <tr>
                <th>Ukuran</th>
                <td><?php echo e($product->size ?: '-'); ?></td>
            </tr>

            <tr>
                <th>Kondisi</th>
                <td><?php echo e($product->condition); ?></td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td><?php echo e($product->description); ?></td>
            </tr>

        </table>

        <a href="<?php echo e(route('admin.products.index')); ?>"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/products/show.blade.php ENDPATH**/ ?>