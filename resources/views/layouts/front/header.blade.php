<?php $segment = Request::segments(); ?>
<header>
    <div class="top_navbar">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand ms-md-5" href="/megatrend/public/">
                    <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" width="250px" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <!-- Search Bar -->
                    <form class="d-flex ms-auto my-2 my-md-0">
                        <input class="form-control me-2" type="search" placeholder="Search anything..." aria-label="Search">
                    </form>

                    <!-- Right-side navigation -->
                    <ul class="navbar-nav me-md-5 ms-auto mb-2 mb-lg-0">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#">
                                <img src="{{ url('assets/images/menu_icon.png') }}" class="img-fluid" alt="menu icon">
                            </a>
                        </li>

                        <li class="nav-item me-3">
                            <a class="nav-link notify_icon" href="#" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <img src="{{ url('assets/images/notify_icon.png') }}" class="img-fluid" alt="notification icon">
                                <span><b>1</b></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="login_icon dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="border: none;">
                                    <img src="{{ url('assets/images/login_icon.png') }}" class="img-fluid" alt="login icon">
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @auth
                                        <li>
                                            <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                style="color: black">Sign Out</a>
                                        </li>
                                    @else
                                        <li><a href="{{ route('signin') }}" style="color: black">Sign In</a></li>
                                        <hr>
                                        <li><a href="{{ route('signup') }}" style="color: black">Sign Up</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
