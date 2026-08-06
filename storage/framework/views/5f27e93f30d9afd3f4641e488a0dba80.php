

<?php $__env->startSection('content'); ?>

<div class="container">

    <h2 class="mb-4">Checkout</h2>

    <div class="card p-4">

        <h4><?php echo e($product->name); ?></h4>

        <img src="<?php echo e(asset('products/'.$product->image)); ?>"
             width="200"
             class="mb-3">

        <p><strong>Harga :</strong> Rp <?php echo e(number_format($product->price)); ?></p>

        <hr>

        <form action="<?php echo e(route('checkout.process',$product->id)); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label>Nama Penerima</label>
                <input type="text"
                       name="receiver_name"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Nomor HP</label>
                <input type="text"
                       name="phone"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Alamat Lengkap</label>
                <textarea
                    name="address"
                    class="form-control"
                    rows="4"
                    required></textarea>
            </div>

            <!-- TAMBAHAN -->
            <div class="mb-3">
                <label>Jumlah Beli</label>
                <input type="number"
                       name="quantity"
                       class="form-control"
                       value="1"
                       min="1"
                       max="<?php echo e($product->stock); ?>"
                       required>
                <small class="text-muted">
                    Stok tersedia : <?php echo e($product->stock); ?>

                </small>
            </div>

            <!-- TAMBAHAN -->
            <div class="mb-3">
                <label>Catatan</label>
                <textarea
                    name="notes"
                    class="form-control"
                    rows="3"
                    placeholder="Contoh: Tolong dikemas dengan rapi (opsional)"></textarea>
            </div>

            <div class="mb-3">

    <label>Kurir</label>

    <select name="courier"
            class="form-control"
            required>

        <option value="">-- Pilih Kurir --</option>

        <option value="J&T Express">J&T Express</option>

        <option value="JNE">JNE</option>

        <option value="SiCepat">SiCepat</option>

        <option value="AnterAja">AnterAja</option>

        <option value="Pos Indonesia">Pos Indonesia</option>

    </select>

</div>

            <div class="mb-3">
                <label>Metode Pembayaran</label>

                <select name="payment_method"
                        id="payment_method"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Metode --</option>

                    <option value="COD">
                        COD
                    </option>

                    <option value="Transfer Bank">
                        Transfer Bank
                    </option>

                    <option value="E-Wallet">
                        E-Wallet
                    </option>

                </select>

            </div>

            <button class="btn btn-success">
                Buat Pesanan
            </button>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/checkout.blade.php ENDPATH**/ ?>