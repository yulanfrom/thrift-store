<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
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
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">
                        Shop
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.page') }}">
                        Category
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">
                        About
                    </a>
                </li>

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            🛒 Cart
                        </a>
                    </li>

                    <li class="nav-item ms-2">
                        <a class="btn btn-dark" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-dark" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>

                @else

                    {{-- Cart --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            🛒 Cart
                        </a>
                    </li>

                    {{-- My Orders khusus User --}}
                    @if(auth()->user()->role == 'user')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.orders') }}">
                                📦 My Orders
                            </a>
                        </li>

                    @endif

                    {{-- Dashboard Admin --}}
                    @if(auth()->user()->role == 'admin')

                        <li class="nav-item ms-2">
                            <a class="btn btn-primary"
                               href="{{ route('admin.dashboard') }}">
                                Dashboard Admin
                            </a>
                        </li>

                    @endif

                    {{-- Dashboard Kurir --}}
                    @if(auth()->user()->role == 'courier')

                        <li class="nav-item ms-2">
                            <a class="btn btn-warning"
                               href="{{ route('courier.dashboard') }}">
                                Dashboard Kurir
                            </a>
                        </li>

                    @endif

                    {{-- Logout --}}
                    <li class="nav-item ms-2">

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="btn btn-danger">
                                Logout
                            </button>

                        </form>

                    </li>

                @endguest

            </ul>

        </div>

    </div>
</nav>