<footer class="bg-dark text-white mt-5 pt-5">

    <div class="container">

        <div class="row">

            <!-- Brand -->
            <div class="col-lg-3 col-md-6 mb-4">

                <h3 class="fw-bold">
                    Fashion Thrift
                </h3>

                <p class="text-light mt-3">
                    Preloved but never out of style.
                    Kami menyediakan pakaian thrift pilihan
                    dengan kualitas terbaik dan harga terjangkau.
                </p>

            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 mb-4">

                <h5 class="fw-bold mb-3">
                    Quick Links
                </h5>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="footer-link">
                            Home
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('shop') }}" class="footer-link">
                            Shop
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('categories.page') }}" class="footer-link">
                            Category
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('about') }}" class="footer-link">
                            About
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Customer Care -->
            <div class="col-lg-3 col-md-6 mb-4">

                <h5 class="fw-bold mb-3">
                    Customer Care
                </h5>

                <p>
                    <i class="bi bi-truck text-warning me-2"></i>
                    Fast Shipping
                </p>

                <p>
                    <i class="bi bi-credit-card text-info me-2"></i>
                    Secure Payment
                </p>

                <p>
                    <i class="bi bi-arrow-repeat text-success me-2"></i>
                    Easy Returns
                </p>

                <p>
                    <i class="bi bi-question-circle text-primary me-2"></i>
                    FAQ
                </p>

            </div>

            <!-- Contact -->
            <div class="col-lg-3 col-md-6 mb-4">

                <h5 class="fw-bold mb-3">
                    Stay Connected
                </h5>

                <p>
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                    Pekanbaru, Riau
                </p>

                <p>
                    <i class="bi bi-whatsapp text-success me-2"></i>
                    0812-3456-7890
                </p>

                <p>
                    <i class="bi bi-envelope-fill text-warning me-2"></i>
                    fashionthrift@gmail.com
                </p>

                <div class="mt-3">

                    <a href="#" class="social-icon">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <a href="#" class="social-icon">
                        <i class="bi bi-facebook"></i>
                    </a>

                </div>

            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center pb-3">

            © {{ date('Y') }} Fashion Thrift Store |
            Sustainable Fashion • Affordable Style

        </div>

    </div>

</footer>

<style>

.footer-link{

    color:#d9d9d9;

    text-decoration:none;

    transition:.3s;

}

.footer-link:hover{

    color:#ffc107;

    padding-left:6px;

}

.social-icon{

    display:inline-flex;

    justify-content:center;

    align-items:center;

    width:45px;

    height:45px;

    margin-right:10px;

    border-radius:50%;

    background:#2d2d2d;

    color:white;

    text-decoration:none;

    transition:.3s;

    font-size:20px;

}

.social-icon:hover{

    background:#ffc107;

    color:black;

    transform:translateY(-5px);

}

footer p{

    color:#d0d0d0;

}

</style>