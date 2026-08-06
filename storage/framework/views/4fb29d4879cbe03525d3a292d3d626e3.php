

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <h2 class="mb-4">
        Dashboard Kurir
    </h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card">

        <div class="card-header bg-primary text-white">
            Daftar Pesanan
        </div>

        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Kurir</th>
                        <th>Metode Bayar</th>
                        <th>Status</th>
                        <th width="280">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($loop->iteration); ?></td>

                        <td><?php echo e($order->user->name); ?></td>

                        <td><?php echo e($order->phone); ?></td>

                        <td><?php echo e($order->address); ?></td>

                        <td><?php echo e($order->courier); ?></td>

                        <td>
                            <?php echo e($order->payment_method); ?>

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

                            
                            
                            
                            <?php if($order->status == 'Dikirim ke Kurir'): ?>

                                <form action="<?php echo e(route('courier.orders.deliver', $order->id)); ?>"
                                      method="POST">

                                    <?php echo csrf_field(); ?>

                                    <button type="submit"
                                            class="btn btn-primary btn-sm">
                                        🚚 Antar Paket
                                    </button>

                                </form>

                            


<?php elseif($order->status == 'Sedang Diantar'): ?>

    
    <?php if(!$order->delivery_proof): ?>

        <form action="<?php echo e(route('courier.orders.uploadProof', $order->id)); ?>"
              method="POST"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <input type="file"
                   name="delivery_proof"
                   class="form-control form-control-sm mb-2"
                   accept="image/*"
                   required>

            <button type="submit"
                    class="btn btn-success btn-sm">
                📷 Upload Bukti Pengiriman
            </button>

        </form>

    <?php else: ?>

        <span class="badge bg-success d-block mb-3">
            ✔ Bukti Pengiriman Berhasil Diupload
        </span>

        
        <?php if($order->payment_method == 'COD'): ?>

            <?php if($order->transfer_proof): ?>

                <span class="badge bg-info">
                    💰 Bukti Transfer COD Sudah Diupload
                </span>

            <?php else: ?>

                <form action="<?php echo e(route('courier.orders.uploadTransfer', $order->id)); ?>"
                      method="POST"
                      enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <label class="form-label fw-bold">
                        Upload Bukti Transfer COD
                    </label>

                    <input type="file"
                           name="transfer_proof"
                           class="form-control form-control-sm mb-2"
                           accept="image/*"
                           required>

                    <button type="submit"
                            class="btn btn-success btn-sm">
                        💰 Upload Bukti Transfer
                    </button>

                </form>

            <?php endif; ?>

        <?php endif; ?>

    <?php endif; ?>

                            


<?php elseif($order->status == 'completed'): ?>

    <span class="badge bg-success">
        ✔ Pengiriman Selesai
    </span>

    <?php if($order->payment_method == 'COD' && $order->transfer_proof): ?>

        <br><br>

        <span class="badge bg-info">
            💰 Bukti Transfer COD Sudah Diupload
        </span>

    <?php endif; ?>

<?php endif; ?>


                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="8" class="text-center">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/courier/dashboard.blade.php ENDPATH**/ ?>