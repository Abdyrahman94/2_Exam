<nav class="navbar navbar-expand-lg bg-success shadow-sm sticky-top" data-bs-theme="dark">
    <div class="container-xl">
        <a class="navbar-brand fw-bold" href="#">
            Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('admin.products.index') ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">Products</a>
                </li>
            </ul>

            <form method="POST" action="{{ route('admin.logout') }}" id="logout">
                @csrf
                <button class="btn btn-danger me-2 btn-sm" type="submit"><i class="bi bi-box-arrow-right"></i>Logout</button>
            </form>
            <form class="d-flex align-items-center" role="search">
                <li class="nav-item dropdown list-unstyled me-2">
                    <a class="btn btn-info btn-sm dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-translate"></i> {{ __('app.Language') }} </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('locale', 'tm') }}"
                                class="dropdown-item overflow-hidden py-1 px-2 rounded">
                                <img src="  https://gnbookstore.com.tm/img/flag/tkm.png" alt="Türkmen"
                                    class="me-2">Turkmenish
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('locale', 'en') }}"class="dropdown-item overflow-hidden py-1 px-2 rounded">
                                <img src="https://gnbookstore.com.tm/img/flag/eng.png" alt="English"
                                    class="me-2">English
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('locale', 'ru') }}"class="dropdown-item overflow-hidden py-1 px-2 rounded">
                                <img src="https://gnbookstore.com.tm/img/flag/rus.png" alt="Русский"
                                    class="me-2">Russian
                            </a>
                        </li>
                    </ul>
                </li>
            </form>
        </div>
    </div>
</nav>
