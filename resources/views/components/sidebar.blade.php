<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">

        <div class="sidenav-header align-items-center">
            <a class="navbar-brand" href="/">
                <h3>{{ Auth::user()->fullname }}</h3>
                {{-- <img src="/img/logo.png" alt="{{ $params->title }}" height=120> --}}
            </a>
        </div>

        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <ul class="navbar-nav">
                    @foreach ($sidebar as $item)
                        <li class="nav-item">
                            <a id="{{ $item->element_id }}" class="nav-link" href="/{{ (Auth::user()->role_id == 1) ? 'admin' : 'client' }}{{ $item->link }}">
                                <i class="{{ $item->icon }} text-primary"></i>
                                <span class="nav-link-text">{{ $item->title }}</span>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a id="menu-logout" class="nav-link" href="/signout">
                            <i class="fas fa-sign-out-alt text-primary"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</nav>
