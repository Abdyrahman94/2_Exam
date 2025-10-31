<nav class="navbar navbar-expand-lg bg-success shadow-sm sticky-top" data-bs-theme="dark">
    <div class="container-xl">
        <a class="navbar-brand fw-bold" href="#">
            {{ __('app.EcoStore') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  {{ Request::routeIs('home.index') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home.index') }}">{{ __('app.Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('products.index') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">{{ __('app.Products') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('contact.index') ? 'active' : '' }}"
                        href="{{ route('contact.index') }}">{{ __('app.Contacts') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('about.index') ? 'active' : '' }}"
                        href="{{ route('about.index') }}">{{ __('app.About') }}</a>
                </li>
            </ul>


            <form class="d-flex align-items-center" role="search">
                <div class="me-2">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm"><span
                            class="bi-box-arrow-in-right me-2"></span>{{ __('app.Login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-sm ms-2">{{ __('app.Register') }}
                        <span class="bi-person-plus"></span></a>
                </div>
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
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm position-relative my-1 my-lg-2 mx-lg-1"
                        href="{{ route('cart.index') }}">
                        <i class="bi bi-basket me-1"></i>{{ __('app.Cart') }}<span
                            class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill"
                            id="cart_count"> {{ session('cart') ? count(session('cart')) : 0 }}</span>
                    </a>
                </li>
            </form>
        </div>
    </div>
</nav>
