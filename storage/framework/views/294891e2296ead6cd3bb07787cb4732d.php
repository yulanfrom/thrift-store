

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <h2 class="mb-4">My Orders</h2>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($loop->iteration); ?></td>

                        
                        <td>
                            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-2">
                                    <?php echo e($detail->product->name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>

                        
                        <td>
                            Rp <?php echo e(number_format($order->total)); ?>

                        </td>

                        
                        <td>

                            <?php if($order->status == 'Dikirim ke Kurir'): ?>

                                <span class="badge bg-warning text-dark">
                                    🚚 Dikirim ke Kurir
                                </span>

                            <?php elseif($order->status == 'Sedang Diantar'): ?>

                                <span class="badge bg-primary">
                                    🚛 Sedang Diantar
                                </span>

                            <?php elseif($order->status == 'completed'): ?>

                                <span class="badge bg-success">
                                    ✔ Selesai
                                </span>

                            <?php else: ?>

                                <span class="badge bg-secondary">
                                    <?php echo e($order->status); ?>

                                </span>

                            <?php endif; ?>

                        </td>

                        
                        <td>

                            <?php if($order->delivery_proof): ?>

                               <a href="<?php echo e(route('user.orders.show', $order->id)); ?>"
   class="btn btn-info btn-sm">

    👁️ Detail

</a>
                            <?php else: ?>

                                <span class="text-muted">
                                    Belum Ada
                                </span>

                            <?php endif; ?>

                        </td>

                        
                        <td>

                            <?php if($order->status == 'Sedang Diantar'): ?>

                                <form action="<?php echo e(route('user.orders.complete', $order->id)); ?>" method="POST">

                                    <?php echo csrf_field(); ?>

                                    <button type="submit" class="btn btn-success btn-sm">
                                        ✅ Barang Diterima
                                    </button>

                                </form>

                            <?php elseif($order->status == 'completed'): ?>

                                <span class="badge bg-success">
                                    ✔ Pesanan Selesai
                                </span>

                            <?php else: ?>

                                <span class="text-muted">
                                    -
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="6" class="text-center">
                            Belum ada pesanan.
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/orders/index.blade.php ENDPATH**/ ?>