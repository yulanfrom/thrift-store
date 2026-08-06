

<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Keranjang Belanja</h2>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if($carts->count()): ?>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Pilih</th>
            <th>Foto</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    <?php
        $grandTotal = 0;
    ?>

    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
        $total = $cart->product->price * $cart->qty;
        $grandTotal += $total;
    ?>

    <tr>

        <td>
            <input type="checkbox"
                   class="cart-check"
                   name="cart_ids[]"
                   value="<?php echo e($cart->id); ?>"
                   data-total="<?php echo e($total); ?>">
        </td>

        <td width="90">
            <img src="<?php echo e(asset('products/'.$cart->product->image)); ?>"
                 width="70"
                 height="70"
                 style="object-fit:cover;border-radius:8px;">
        </td>

        <td>
            <?php echo e($cart->product->name); ?>

        </td>

        <td>
            Rp <?php echo e(number_format($cart->product->price,0,',','.')); ?>

        </td>

        <td>

            <div class="d-flex align-items-center">

                <form action="<?php echo e(route('cart.decrease',$cart->id)); ?>"
                      method="POST"
                      class="me-2">

                    <?php echo csrf_field(); ?>

                    <button type="submit"
                            class="btn btn-danger btn-sm">
                        -
                    </button>

                </form>

                <strong><?php echo e($cart->qty); ?></strong>

                <form action="<?php echo e(route('cart.increase',$cart->id)); ?>"
                      method="POST"
                      class="ms-2">

                    <?php echo csrf_field(); ?>

                    <button type="submit"
                            class="btn btn-success btn-sm">
                        +
                    </button>

                </form>

            </div>

        </td>

        <td>
            Rp <?php echo e(number_format($total,0,',','.')); ?>

        </td>

        <td>

            <form action="<?php echo e(route('cart.remove',$cart->id)); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button class="btn btn-danger btn-sm">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>

<h4 class="mt-3">
    Total Belanja :
    <strong id="selectedTotal">
        Rp 0
    </strong>
</h4>

<div class="mt-4">

    <a href="<?php echo e(route('shop')); ?>"
       class="btn btn-secondary">
        ← Lanjut Belanja
    </a>

    <button type="button"
            class="btn btn-success"
            onclick="checkoutSelected()">
        Checkout Barang Terpilih
    </button>

</div>

<form id="checkoutForm"
      action="<?php echo e(route('checkout.selected')); ?>"
      method="POST"
      style="display:none;">

    <?php echo csrf_field(); ?>

</form>

<script>

function checkoutSelected(){

    let form = document.getElementById('checkoutForm');

    form.innerHTML = '<?php echo csrf_field(); ?>';

    document.querySelectorAll('.cart-check:checked').forEach(function(item){

        form.innerHTML +=
            '<input type="hidden" name="cart_ids[]" value="'+item.value+'">';

    });

    form.submit();

}

// =======================
// TOTAL OTOMATIS
// =======================

function updateTotal(){

    let total = 0;

    document.querySelectorAll('.cart-check:checked').forEach(function(item){

        total += parseInt(item.dataset.total);

    });

    document.getElementById('selectedTotal').innerHTML =
        'Rp ' + total.toLocaleString('id-ID');

}

document.querySelectorAll('.cart-check').forEach(function(item){

    item.addEventListener('change', updateTotal);

});

// Saat halaman pertama dibuka
updateTotal();

</script>

<?php else: ?>

<div class="alert alert-warning">
    Keranjang masih kosong.
</div>

<a href="<?php echo e(route('shop')); ?>" class="btn btn-primary">
    Belanja Sekarang
</a>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/cart.blade.php ENDPATH**/ ?>