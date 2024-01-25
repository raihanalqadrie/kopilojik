<!-- Navbar Start -->
<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="/" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white"><img src="{{ asset('img/logo.png') }}" alt=""
                    style="width: 80px"></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="/" class="nav-item nav-link {{ Request::Is('/') ? 'active' : '' }}">Home</a>
                <a href="/about" class="nav-item nav-link {{ Request::Is('about') ? 'active' : '' }}">About</a>
                <a href="/menu" class="nav-item nav-link {{ Request::Is('menu') ? 'active' : '' }}">Menu</a>
                <a href="/contact" class="nav-item nav-link {{ Request::Is('contact') ? 'active' : '' }}">Contact</a>
                <div class="nav-item dropdown">
                    @auth
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Welcome Back,
                            {{ auth()->user()->name }}</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="/dashboard" class="dropdown-item">Dashboard</a>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/admin" class="nav-link {{ Request::Is('admin') ? 'active' : '' }}"><i
                            class="bi bi-box-arrow-in-right"></i> Login</a>
                @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
