

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2>Detail Pesanan</h2>

    <hr>

    <p>
        <strong>Nama Pembeli :</strong>
        <?php echo e($order->user->name); ?>

    </p>

    <p>
        <strong>Status :</strong>
        <?php echo e(ucfirst($order->status)); ?>

    </p>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>Produk</th>
                <th>Qty</th>
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
                    Rp <?php echo e(number_format($detail->qty * $detail->price)); ?>

                </td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

    <h5>
        Total :
        <strong>Rp <?php echo e(number_format($order->total)); ?></strong>
    </h5>

    <hr>

    <form action="<?php echo e(route('admin.orders.update',$order->id)); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <input type="hidden"
       name="status"
       value="completed">

        <button class="btn btn-success">
            Tandai Selesai
        </button>

        <a href="<?php echo e(route('admin.orders.index')); ?>"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>