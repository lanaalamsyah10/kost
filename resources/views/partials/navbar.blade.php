{{-- TAMPILAN NAV --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/navbar1.png') }} " alt="logo" style="width:120px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container mb-2">
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'about' ? 'active' : '' }}" href="/about">Tentang
                        Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'posts' ? 'active' : '' }}" href="/posts">Kost</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'categories' ? 'active' : '' }}"
                        href="/categories">Area</a>
                </li>
            </ul>

            @auth
                <div class=" navbar-collapse  justify-content-end">
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Selamat datang, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @can('super_admin')
                                    <li>
                                        <a class="dropdown-item" href="/dashboard"><i
                                                class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a>
                                    </li>
                                @endcan
                                @can('admin')
                                    <li>
                                        <a class="dropdown-item" href="/dashboard"><i
                                                class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a>
                                    </li>
                                @endcan
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                            logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        @if (!auth()->check())
                            @if (!Request::is('login'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary active"
                                        {{ request()->segment(1) == 'categories' ? 'active' : '' }} href="/login">Masuk</a>
                                </li>
                            @endif
                        @else
                            <a href="/login">Login</a>
                        @endif
                        <!-- Modal -->
                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="card-title h4 my-4 ">Masuk Ke KostJogja</p>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </div>

                                    <div class="card-body">
                                        <div class="modal-body">
                                            <p><a class="dropdown-item " href="/login">
                                                    <img src="{{ asset('img/pck.svg') }}" alt=""
                                                        style="width:70px;">
                                                    Pencari Kost
                                                </a></p>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <div class="modal-body">
                                            <p><a class="dropdown-item " href="/login/pemilik">
                                                    <img src="{{ asset('img/pmk.svg') }}" alt=""
                                                        style="width:70px;">
                                                    Pemilik Kost
                                                </a></p>
                                            <hr class="dropdown-divider">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </ul>
                </div>
            @endauth


        </div>
    </div>
</nav>
