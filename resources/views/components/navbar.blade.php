<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Backend Coding Challenge</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">

                @if (auth()->guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dash') }}">Dash Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->guard('admin')->user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" href="">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
