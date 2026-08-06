

<?php $__env->startSection('content'); ?>

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="text-success">🎉 Pesanan Berhasil Dibuat</h2>

        <hr>

        <p>
            <strong>Metode Pembayaran :</strong>
            <?php echo e($order->payment_method); ?>

        </p>

        <p>
    <strong>Kurir :</strong>
    <?php echo e($order->courier); ?>

</p>

        <p>
            <strong>Status Pembayaran :</strong>
            <?php echo e($order->payment_status); ?>

        </p>

        <p>
    <strong>Total :</strong>
    Rp <?php echo e(number_format($order->total)); ?>

</p>

<p>
    <strong>Jumlah Beli :</strong>
    <?php echo e($order->quantity); ?>

</p>

<p>
    <strong>Catatan :</strong>
    <?php echo e($order->notes ?? '-'); ?>

</p>

        <hr>

        <?php if($order->payment_method == 'COD'): ?>

    <div class="alert alert-success">

        <h5>Pembayaran COD</h5>

        Barang akan dikirim menggunakan
        <b><?php echo e($order->courier); ?></b>.

        <hr>

        Saat barang diterima, silakan lakukan pembayaran
        langsung kepada kurir.

        <br><br>

        Setelah kurir menyerahkan uang kepada toko,
        admin akan melakukan verifikasi pembayaran.

    </div>

<?php elseif($order->payment_method == 'Transfer Bank'): ?>

    <div class="alert alert-warning">

        <h5>Transfer ke rekening berikut:</h5>

        <hr>

        <b>Bank BCA</b><br>
        No. Rekening : <b>1234567890</b><br>
        A/N : <b>Fashion Thrift Store</b>

        <hr>

        Setelah transfer, klik tombol
        <b>"Saya Sudah Transfer"</b>.

    </div>

    <form action="<?php echo e(route('payment.confirm', $order->id)); ?>"
          method="POST">

        <?php echo csrf_field(); ?>

        <button class="btn btn-success">
            Saya Sudah Transfer
        </button>

    </form>

<?php elseif($order->payment_method == 'E-Wallet'): ?>

    <div class="alert alert-info">

        <h5>Pembayaran E-Wallet</h5>

        Dana / OVO / GoPay

        <br><br>

        <b>08123456789</b>

        <hr>

        Setelah bayar klik tombol di bawah.

    </div>

    <form action="<?php echo e(route('payment.confirm', $order->id)); ?>"
          method="POST">

        <?php echo csrf_field(); ?>

        <button class="btn btn-success">
            Saya Sudah Bayar
        </button>

    </form>

<?php endif; ?>

        <a href="<?php echo e(route('shop')); ?>"
           class="btn btn-primary mt-3">

            Kembali Belanja

        </a>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/checkout-success.blade.php ENDPATH**/ ?>