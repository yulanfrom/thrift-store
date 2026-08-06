

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">📦 Kelola Pesanan</h4>
                <small>Kelola seluruh transaksi pelanggan.</small>
            </div>

            <span class="badge bg-light text-dark fs-6">
                Total : <?php echo e($orders->count()); ?> Pesanan
            </span>
        </div>

        <div class="card-body">

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark text-center">

                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th width="220">Produk</th>
                        <th>Kurir</th>
                        <th>Metode</th>
                        <th>Status Bayar</th>
                        <th>Status Pesanan</th>
                        <th>Bukti Pengiriman</th>
                        <th>Bukti Transfer</th>
                        <th>Total</th>
                        <th width="180">Aksi</th>
                    </tr>

                    </thead>

                    <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td class="text-center">
                            <?php echo e($loop->iteration); ?>

                        </td>

                        <td>
                            <strong><?php echo e($order->user->name); ?></strong>
                        </td>

                        <td>

                            <ul class="mb-0 ps-3">

                                <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li><?php echo e($detail->product->name); ?></li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                        </td>

                        <td class="text-center">

                            <span class="badge bg-info text-dark px-3 py-2">
                                <?php echo e($order->courier); ?>

                            </span>

                        </td>

                        <td class="text-center">

                            <?php if($order->payment_method == 'COD'): ?>

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    COD
                                </span>

                            <?php else: ?>

                                <span class="badge bg-primary px-3 py-2">
                                    Transfer
                                </span>

                            <?php endif; ?>

                        </td>

                        
                        <td class="text-center">

                            <?php if($order->payment_status == 'Belum Bayar'): ?>

                                <span class="badge bg-danger px-3 py-2">
                                    Belum Bayar
                                </span>

                            <?php elseif($order->payment_status == 'Menunggu Verifikasi'): ?>

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Menunggu Verifikasi
                                </span>

                            <?php elseif($order->payment_status == 'Sudah Bayar'): ?>

                                <span class="badge bg-success px-3 py-2">
                                    Sudah Bayar
                                </span>

                            <?php endif; ?>

                        </td>

                        
                        <td class="text-center">

                            <?php if($order->status == 'pending'): ?>

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Pending
                                </span>

                            <?php elseif($order->status == 'processing'): ?>

                                <span class="badge bg-primary px-3 py-2">
                                    Diproses
                                </span>

                            <?php elseif($order->status == 'Dikirim ke Kurir'): ?>

                                <span class="badge bg-info px-3 py-2">
                                    🚚 Dikirim
                                </span>

                            <?php elseif($order->status == 'Sedang Diantar'): ?>

                                <span class="badge bg-secondary px-3 py-2">
                                    🚛 Diantar
                                </span>

                            <?php elseif($order->status == 'completed'): ?>

                                <span class="badge bg-success px-3 py-2">
                                    ✔ Selesai
                                </span>

                            <?php else: ?>

                                <span class="badge bg-dark">
                                    <?php echo e($order->status); ?>

                                </span>

                            <?php endif; ?>

                        </td>

                        
                        <td class="text-center">

                            <?php if($order->delivery_proof): ?>

                                <a href="<?php echo e(asset('delivery_proofs/'.$order->delivery_proof)); ?>" target="_blank">

                                    <img
                                        src="<?php echo e(asset('delivery_proofs/'.$order->delivery_proof)); ?>"
                                        width="85"
                                        class="img-thumbnail rounded shadow-sm">

                                </a>

                            <?php else: ?>

                                <span class="badge bg-secondary">
                                    Belum Ada
                                </span>

                            <?php endif; ?>

                        </td>

                        
                        <td class="text-center">

                            <?php if($order->payment_method == 'COD'): ?>

                                <?php if($order->transfer_proof): ?>

                                    <a href="<?php echo e(asset('transfer_proofs/'.$order->transfer_proof)); ?>" target="_blank">

                                        <img
                                            src="<?php echo e(asset('transfer_proofs/'.$order->transfer_proof)); ?>"
                                            width="85"
                                            class="img-thumbnail rounded shadow-sm">

                                    </a>

                                <?php else: ?>

                                    <span class="badge bg-warning text-dark">
                                        Belum Upload
                                    </span>

                                <?php endif; ?>

                            <?php else: ?>

                                <span class="text-muted">-</span>

                            <?php endif; ?>

                        </td>

                        
                        <td class="text-end">

                            <strong class="text-success">
                                Rp <?php echo e(number_format($order->total)); ?>

                            </strong>

                        </td>

                        
                        <td>

                            <div class="d-grid gap-2">

                                <div class="d-inline-block position-relative">

    <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>"
       class="btn btn-primary btn-sm">
        👁 Detail
    </a>

    <?php if(!$order->admin_read): ?>
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">Belum dibaca</span>
        </span>
    <?php endif; ?>

</div>

                                <?php if($order->payment_method != 'COD'): ?>

                                    <?php if($order->payment_status == 'Menunggu Verifikasi'): ?>

                                        <form action="<?php echo e(route('admin.orders.verify',$order->id)); ?>"
                                              method="POST">

                                            <?php echo csrf_field(); ?>

                                            <button class="btn btn-success btn-sm w-100">

                                                ✔ Verifikasi

                                            </button>

                                        </form>

                                    <?php elseif($order->status == 'processing'): ?>

                                        <form action="<?php echo e(route('admin.orders.sendToCourier',$order->id)); ?>"
                                              method="POST">

                                            <?php echo csrf_field(); ?>

                                            <button class="btn btn-warning btn-sm w-100">

                                                🚚 Kirim ke Kurir

                                            </button>

                                        </form>

                                    <?php elseif($order->status == 'completed'): ?>

                                        <button class="btn btn-success btn-sm" disabled>

                                            ✔ Selesai

                                        </button>

                                    <?php endif; ?>

                                <?php else: ?>

                                    <?php if($order->status == 'pending'): ?>

                                        <form action="<?php echo e(route('admin.orders.sendToCourier',$order->id)); ?>"
                                              method="POST">

                                            <?php echo csrf_field(); ?>

                                            <button class="btn btn-warning btn-sm w-100">

                                                🚚 Kirim ke Kurir

                                            </button>

                                        </form>

                                    <?php elseif($order->status == 'Dikirim ke Kurir'): ?>

                                        <button class="btn btn-info btn-sm" disabled>

                                            🚚 Sudah ke Kurir

                                        </button>

                                    <?php elseif($order->status == 'Sedang Diantar'): ?>

                                        <button class="btn btn-secondary btn-sm" disabled>

                                            🚛 Sedang Diantar

                                        </button>

                                    <?php elseif($order->status == 'completed'): ?>

                                        <button class="btn btn-success btn-sm" disabled>

                                            ✔ Selesai

                                        </button>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="11" class="text-center py-5">

                            <h5 class="text-muted">

                                Belum ada pesanan.

                            </h5>

                        </td>

                    </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>