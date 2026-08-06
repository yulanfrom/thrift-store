

<?php $__env->startSection('content'); ?>

<h2 class="fw-bold mb-2">
    Explore Categories
</h2>

<p class="text-muted mb-5">
    Temukan fashion thrift favoritmu berdasarkan kategori.
</p>

<div class="row">

    <!-- Sidebar Kategori -->
    <div class="col-md-3 mb-4">

        <h5 class="fw-bold mb-4">
            Clothing
        </h5>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <a href="<?php echo e(route('category.products', $category->id)); ?>"
               class="category-link">

                <?php echo e(ucfirst($category->name)); ?>


            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <!-- Banner -->
    <div class="col-md-9">

        <?php
            $images = [
                'model1.jpg',
                'model2.jpg',
                'model3.jpg',
            ];

            shuffle($images);
        ?>

        <div class="row">

            <?php for($i = 0; $i < 3; $i++): ?>

            <div class="col-md-4 mb-4">

                <div class="category-image">

                    <img src="<?php echo e(asset('images/category-banner/' . $images[$i])); ?>"
                         alt="Fashion">

                </div>

            </div>

            <?php endfor; ?>

        </div>

    </div>

</div>

<style>

.category-link{
    display:block;
    color:#333;
    text-decoration:none;
    font-size:18px;
    margin-bottom:18px;
    transition:all .25s ease;
}

.category-link:hover{
    color:#000;
    font-weight:600;
    transform:translateX(10px) scale(1.08);
}

.category-image{
    overflow:hidden;
    border-radius:18px;
    height:420px;
    box-shadow:0 10px 30px rgba(0,0,0,.12);
}

.category-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.5s;
}

.category-image:hover img{
    transform:scale(1.08);
}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/user/categories.blade.php ENDPATH**/ ?>