<nav class="navbar navbar-expand-lg navbar-light bg-light ps-3" style="margin-left: 250px;">
    <div class="container-fluid">
        <span class="navbar-brand">Cafeteria</span>

        <ul class="navbar-nav ms-auto me-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name ?? 'Admin' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            @auth
                                <button type="submit" class="dropdown-item">Logout</button>
                            @endauth
                            @guest
                                <button type="submit" class="dropdown-item">Login</button>
                            @endguest
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>