

<?php $__env->startSection('content'); ?>

<div class="container py-4">


    <div class="card shadow">

        <div class="card-header">
            <h3>Detail Pesanan</h3>
        </div>

        <div class="card-body">

            <h5>Data Pembeli</h5>

            <table class="table table-bordered">

                <tr>
                    <th width="220">Nama Pembeli</th>
                    <td><?php echo e($order->user->name); ?></td>
                </tr>

                <tr>
                    <th>Penerima</th>
                    <td><?php echo e($order->receiver_name); ?></td>
                </tr>

                <tr>
                    <th>No HP</th>
                    <td><?php echo e($order->phone); ?></td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td><?php echo e($order->address); ?></td>
                </tr>

                <tr>
                    <th>Kurir</th>
                    <td><?php echo e($order->courier); ?></td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td><?php echo e($order->payment_method); ?></td>
                </tr>

                <tr>
                    <th>Status Pembayaran</th>
                    <td><?php echo e($order->payment_status); ?></td>
                </tr>

                <tr>
                    <th>Status Pesanan</th>
                    <td><?php echo e($order->status); ?></td>
                </tr>

            </table>

            <hr>

            <h5>Daftar Produk</h5>

            <table class="table table-bordered">

    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

    <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

            <td><?php echo e($detail->product->name); ?></td>

            <td><?php echo e($detail->qty); ?></td>

            <td>
                Rp <?php echo e(number_format($detail->price)); ?>

            </td>

            <td>
                Rp <?php echo e(number_format($detail->price * $detail->qty)); ?>

            </td>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

            <h4 class="mt-4">
                Total : Rp <?php echo e(number_format($order->total)); ?>

            </h4>

            <hr>

<h5>Catatan Pembeli</h5>

<?php if($order->notes): ?>

    <div class="alert alert-info">
        <?php echo e($order->notes); ?>

    </div>

<?php else: ?>

    <div class="text-muted">
        Tidak ada catatan.
    </div>

<?php endif; ?>

            <hr>

            <h5>Bukti Pengiriman</h5>

            <?php if($order->delivery_proof): ?>

                <img src="<?php echo e(asset('delivery_proofs/'.$order->delivery_proof)); ?>"
                     class="img-fluid rounded shadow mb-3"
                     style="max-width:350px">

            <?php else: ?>

                <div class="alert alert-warning">
                    Belum ada bukti pengiriman.
                </div>

            <?php endif; ?>

            
            <?php if($order->payment_method == 'COD'): ?>

                <hr>

                <h5>Bukti Transfer dari Kurir</h5>

                <?php if($order->transfer_proof): ?>

                    <img src="<?php echo e(asset('transfer_proofs/'.$order->transfer_proof)); ?>"
                         class="img-fluid rounded shadow mb-3"
                         style="max-width:350px">

                    <br>

                    <?php if($order->payment_status != 'Sudah Bayar'): ?>

                        <form action="<?php echo e(route('admin.orders.confirmTransfer', $order->id)); ?>"
                              method="POST">

                            <?php echo csrf_field(); ?>

                            <button type="submit" class="btn btn-success">
                                ✔ Konfirmasi Transfer Kurir
                            </button>

                        </form>

                    <?php else: ?>

                        <span class="badge bg-success fs-6">
                            ✔ Transfer Sudah Dikonfirmasi
                        </span>

                    <?php endif; ?>

                <?php else: ?>

                    <div class="alert alert-warning">
                        Kurir belum upload bukti transfer COD.
                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>