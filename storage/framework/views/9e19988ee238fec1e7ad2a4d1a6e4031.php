

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Shop</h2>
        <p class="text-muted">Temukan koleksi fashion thrift terbaik.</p>
    </div>

    <input type="text" class="form-control w-25" placeholder="Cari produk...">

</div>

<div class="row">

<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="col-md-3 mb-4">

        <div class="card shadow-sm border-0">

            <div class="position-relative">

                <img src="<?php echo e(asset('products/'.$product->image)); ?>"
                     class="card-img-top"
                     style="height:300px; object-fit:cover;"
                     alt="<?php echo e($product->name); ?>">

                <?php if($product->stock <= 0): ?>

                    <div class="sold-overlay">
                        Habis
                    </div>

                <?php endif; ?>

            </div>

            <div class="card-body">

                <h5><?php echo e($product->name); ?></h5>

                <small class="text-muted d-block">
                    <?php echo e($product->brand); ?>

                </small>

                <p class="text-muted">
                    Rp <?php echo e(number_format($product->price,0,',','.')); ?>

                </p>

                <?php if($product->stock > 0): ?>

                    <a href="<?php echo e(route('product.detail', $product->id)); ?>"
                       class="btn btn-dark w-100">
                        Detail
                    </a>

                <?php else: ?>

                    <button class="btn btn-secondary w-100" disabled>
                        Stok Habis
                    </button>

                <?php endif; ?>

            </div>

        </div>

    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="col-12">

        <div class="alert alert-warning text-center">
            Belum ada produk.
        </div>

    </div>

<?php endif; ?>

</div>

<style>

.sold-overlay{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(0,0,0,.55);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;
    font-weight:bold;
    z-index:10;
}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/products.blade.php ENDPATH**/ ?>