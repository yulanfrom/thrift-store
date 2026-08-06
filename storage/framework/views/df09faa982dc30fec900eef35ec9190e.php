

<?php $__env->startSection('content'); ?>

<div class="container py-4">


    <div class="card shadow">

        <div class="card-header">
            <h4>Detail Pesanan</h4>
        </div>

        <div class="card-body">

            <h5>Produk</h5>

            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="mb-3">

                    <strong><?php echo e($detail->product->name); ?></strong><br>

                    Jumlah : <?php echo e($detail->quantity); ?>


                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <hr>

            <p>
                <strong>Total :</strong>

                Rp <?php echo e(number_format($order->total)); ?>

            </p>

            <p>
                <strong>Status :</strong>

                <?php echo e($order->status); ?>

            </p>

            <p>
                <strong>Kurir :</strong>

                <?php echo e($order->courier); ?>

            </p>

            <p>
                <strong>Alamat :</strong>

                <?php echo e($order->address); ?>

            </p>

            <hr>

            <h5>Bukti Pengiriman</h5>

            <?php if($order->delivery_proof): ?>

            <p><?php echo e(url('delivery_proofs/'.$order->delivery_proof)); ?></p>

    <div class="text-center mt-3">
    <img src="<?php echo e(asset('delivery_proofs/' . $order->delivery_proof)); ?>"
         alt="Bukti Pengiriman"
         class="img-thumbnail shadow"
          style="width:350px; height:auto; object-fit:cover;">

    <p class="text-muted mt-2">
        Bukti pengiriman dari kurir
    </p>
</div>

<?php else: ?>

    <div class="alert alert-warning">
        Belum ada bukti pengiriman.
    </div>

<?php endif; ?>

        </div>

    </div>

</div>

<a href="<?php echo e(route('user.orders')); ?>" class="btn btn-secondary mb-3">
        ← Kembali ke My Orders
    </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/orders/show.blade.php ENDPATH**/ ?>