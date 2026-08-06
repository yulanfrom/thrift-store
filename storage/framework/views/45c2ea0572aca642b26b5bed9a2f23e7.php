

<?php $__env->startSection('content'); ?>

<div class="container py-5">

    <div class="row">

        <div class="col-md-6">

            <img src="<?php echo e(asset('products/'.$product->image)); ?>"
                 class="img-fluid rounded shadow">

        </div>

        <div class="col-md-6">

            <h2><?php echo e($product->name); ?></h2>

            <p class="text-muted">
                <strong>Brand :</strong>
                <?php echo e($product->brand); ?>

            </p>

            <h3 class="text-danger mb-3">
                Rp <?php echo e(number_format($product->price,0,',','.')); ?>

            </h3>

            <table class="table">

                <tr>
                    <th width="150">Kategori</th>
                    <td><?php echo e($product->category->name); ?></td>
                </tr>

                <tr>
                    <th>Ukuran</th>
                    <td><?php echo e($product->size); ?></td>
                </tr>

                <tr>
                    <th>Kondisi</th>
                    <td><?php echo e($product->condition); ?></td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td><?php echo e($product->stock); ?></td>
                </tr>

            </table>

            <h5 class="mb-2">Deskripsi</h5>

            <div id="descriptionBox" class="description-box">
                <?php echo e(trim($product->description)); ?>

            </div>

            <button
                type="button"
                id="toggleDescription"
                class="btn p-0 mt-2"
                style="color:#000;border:none;background:none;font-weight:500;">

                Lihat Selengkapnya ▼

            </button>

            <div class="mt-4">

                <div class="d-flex gap-3 mb-3">

                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded-3">
                            <i class="bi bi-cart-plus"></i>
                            Tambah ke Keranjang
                        </button>
                    </form>

                    <a href="<?php echo e(route('checkout', $product->id)); ?>"
                       class="btn btn-dark px-4 py-2 rounded-3">
                        <i class="bi bi-bag-check"></i>
                        Checkout Sekarang
                    </a>

                </div>

                <a href="<?php echo e(route('shop')); ?>"
                   class="btn btn-outline-secondary rounded-3">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Shop
                </a>

            </div>

        </div>

    </div>

</div>

<style>

.description-box{
    max-height:120px;
    overflow:hidden;
    white-space:pre-line;
    line-height:1.6;
    margin:0;
    padding:0;
}

</style>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const box = document.getElementById("descriptionBox");
    const btn = document.getElementById("toggleDescription");

    let opened = false;

    btn.addEventListener("click", function () {

        if(opened){

            box.style.maxHeight = "120px";
            btn.innerHTML = "Lihat Selengkapnya ▼";

        }else{

            box.style.maxHeight = "1000px";
            btn.innerHTML = "Lihat Lebih Sedikit ▲";

        }

        opened = !opened;

    });

});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/product-detail.blade.php ENDPATH**/ ?>