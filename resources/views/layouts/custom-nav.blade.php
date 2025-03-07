<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/img/admin-system-logo.png') }}">
            </a>
            
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link d-fles align-items-center" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle fa-2x"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end position-absolute" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item ps-4 text-start d-flex flex-column" href="{{ route('profile.edit') }}">
                            <strong>{{ Auth::user()->name }}</strong>
                            <span class="text-muted fs-11">View Profile</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item ps-4 py-2 bg-white hover-bg-light">Log Out</button>
                        </form>
                    </li>
                </ul>
                </li>

            </ul>
    </div>
</nav>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

