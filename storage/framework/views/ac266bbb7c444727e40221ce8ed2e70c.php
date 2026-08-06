

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Data Kategori
            </h2>

            <p class="text-muted">
                Kelola seluruh kategori produk Fashion Thrift Store.
            </p>

        </div>

        <a href="<?php echo e(route('admin.categories.create')); ?>"
           class="btn btn-success rounded-pill px-4">

            <i class="bi bi-plus-circle-fill"></i>
            Tambah Kategori

        </a>

    </div>

    <?php if(session('success')): ?>

    <div class="alert alert-success alert-dismissible fade show">

        <?php echo e(session('success')); ?>


        <button class="btn-close"
                data-bs-dismiss="alert"></button>

    </div>

    <?php endif; ?>

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-dark text-white rounded-top-4">

            <h5 class="mb-0">
                <i class="bi bi-folder-fill"></i>
                Daftar Kategori
            </h5>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="80">No</th>

                        <th>Nama Kategori</th>

                        <th width="400">Deskripsi</th>

                        <th width="180" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

<tr>

    <td>
        <?php echo e($loop->iteration); ?>

    </td>

    <td class="fw-semibold text-dark">
        <?php echo e(ucfirst($category->name)); ?>

    </td>

    <td style="max-width:350px;">

    <?php if($category->description): ?>

        <span
            title="<?php echo e($category->description); ?>"
            style="cursor:pointer;">

            <?php echo e(\Illuminate\Support\Str::limit($category->description, 60)); ?>


        </span>

    <?php else: ?>

        <span class="badge bg-secondary">
            Tidak ada deskripsi
        </span>

    <?php endif; ?>

</td>

    <td class="text-center">

        <a href="<?php echo e(route('admin.categories.edit',$category->id)); ?>"
           class="btn btn-warning btn-sm rounded-pill">

            <i class="bi bi-pencil-square"></i>

        </a>

        <form action="<?php echo e(route('admin.categories.destroy',$category->id)); ?>"
              method="POST"
              class="d-inline">

            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <button class="btn btn-danger btn-sm rounded-pill"
                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                <i class="bi bi-trash-fill"></i>

            </button>

        </form>

    </td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<tr>

    <td colspan="4" class="text-center py-5">

        <i class="bi bi-folder-x fs-1 text-secondary"></i>

        <h5 class="mt-3">
            Belum ada kategori
        </h5>

        <p class="text-muted">
            Silakan tambahkan kategori baru.
        </p>

    </td>

</tr>

<?php endif; ?>

</tbody>

            </table>

        </div>

    </div>

</div>

<style>

.table tbody tr{
    transition:.25s;
}

.table tbody tr:hover{
    background:#f8f9fa;
}

.btn{
    transition:.3s;
}

.btn:hover{
    transform:translateY(-2px);
}

.badge{
    border-radius:20px;
}

.card{
    overflow:hidden;
}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>