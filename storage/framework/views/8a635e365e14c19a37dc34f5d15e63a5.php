

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">📊 Laporan Penjualan</h2>

    
    <div class="card mb-4">
        <div class="card-body">

            <form method="GET" action="<?php echo e(route('admin.reports.index')); ?>">

                <div class="row">

                    <div class="col-md-4">
                        <label>Tanggal Awal</label>
                        <input type="date"
                               name="start_date"
                               class="form-control"
                               value="<?php echo e(request('start_date')); ?>">
                    </div>

                    <div class="col-md-4">
                        <label>Tanggal Akhir</label>
                        <input type="date"
                               name="end_date"
                               class="form-control"
                               value="<?php echo e(request('end_date')); ?>">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">

                        <button class="btn btn-primary me-2">
                            🔍 Filter
                        </button>

                        <a href="<?php echo e(route('admin.reports.index')); ?>"
                           class="btn btn-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>

    
    <div class="card">

        <div class="card-header bg-success text-white">
            Daftar Transaksi Selesai
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pembeli</th>
                        <th>Produk</th>
                        <th>Kurir</th>
                        <th>Metode</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($loop->iteration); ?></td>

                        <td><?php echo e($order->created_at->format('d-m-Y')); ?></td>

                        <td><?php echo e($order->user->name); ?></td>

                        <td>
                            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($detail->product->name); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>

                        <td><?php echo e($order->courier); ?></td>

                        <td><?php echo e($order->payment_method); ?></td>

                        <td>
                            Rp <?php echo e(number_format($order->total,0,',','.')); ?>

                        </td>

                        <td>

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="8" class="text-center">
                            Tidak ada data.
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    
    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Transaksi</h5>

                    <h3><?php echo e($jumlahTransaksi); ?></h3>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-body">

                    <h5>Total Pendapatan</h5>

                    <h3>
                        Rp <?php echo e(number_format($totalPendapatan,0,',','.')); ?>

                    </h3>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>