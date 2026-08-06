<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="<?php echo e(route('home')); ?>">
            Fashion Thrift
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('shop')); ?>">
                        Shop
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('categories.page')); ?>">
                        Category
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('about')); ?>">
                        About
                    </a>
                </li>

                <?php if(auth()->guard()->guest()): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cart')); ?>">
                            🛒 Cart
                        </a>
                    </li>

                    <li class="nav-item ms-2">
                        <a class="btn btn-dark" href="<?php echo e(route('login')); ?>">
                            Login
                        </a>
                    </li>

                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-dark" href="<?php echo e(route('register')); ?>">
                            Register
                        </a>
                    </li>

                <?php else: ?>

                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cart')); ?>">
                            🛒 Cart
                        </a>
                    </li>

                    
                    <?php if(auth()->user()->role == 'user'): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('user.orders')); ?>">
                                📦 My Orders
                            </a>
                        </li>

                    <?php endif; ?>

                    
                    <?php if(auth()->user()->role == 'admin'): ?>

                        <li class="nav-item ms-2">
                            <a class="btn btn-primary"
                               href="<?php echo e(route('admin.dashboard')); ?>">
                                Dashboard Admin
                            </a>
                        </li>

                    <?php endif; ?>

                    
                    <?php if(auth()->user()->role == 'courier'): ?>

                        <li class="nav-item ms-2">
                            <a class="btn btn-warning"
                               href="<?php echo e(route('courier.dashboard')); ?>">
                                Dashboard Kurir
                            </a>
                        </li>

                    <?php endif; ?>

                    
                    <li class="nav-item ms-2">

                        <form action="<?php echo e(route('logout')); ?>" method="POST">

                            <?php echo csrf_field(); ?>

                            <button class="btn btn-danger">
                                Logout
                            </button>

                        </form>

                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>
</nav><?php /**PATH C:\xampp\htdocs\web\resources\views/partials/navbar.blade.php ENDPATH**/ ?>