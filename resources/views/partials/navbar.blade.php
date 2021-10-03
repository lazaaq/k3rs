<nav class="navbar navbar-expand-lg position-fixed w-100">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a href="/logout" class="btn btn-primary my-btn">Logout</a>
                </li>
                <li class="nav-item ms-2">
                    <a href="/dashboard" class="btn btn-primary my-btn">My Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="btn btn-primary my-btn">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>