<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('app.EcoStore') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/EcoStore.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success shadow-sm" data-bs-theme="dark">
        <div class="container-xl">
            <a class="navbar-brand fw-bold" href="#">
                {{ __('app.EcoStore') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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


                <form action="{{ route('logout') }}" method="post" class="me-3">
                    @csrf
                    <input type="hidden">
                    <button type="submit" class="btn btn-danger btn-sm"><span
                            class="bi bi-box-arrow-left me-1"></span>{{ __('app.Logout') }}</button>
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
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm position-relative my-1 my-lg-2 mx-lg-1" href="">
                            <i class="bi bi-basket me-1"></i>{{ __('app.Cart') }}<span
                                class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill"
                                id="cart">0</span>
                        </a>
                    </li>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h2 class="fw-bold text-center mb-5 text-primary">
                    Biz bilen habarlaşyň
                </h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="card shadow-sm  rounded-4 h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-dark">Hatyňyzy bize ugratmagyňyz üçin forma</h5>

                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Adyňyz</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Adyňyzy giriziň" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email adresiňiz</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="example@email.com" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Hatyňyz</label>
                                        <textarea id="message" name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Hatyňyzy şu ýere ýazyň..." required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                            <i class="bi bi-send-fill me-2"></i> Ugrat
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow-sm rounded-4 h-100 bg-light">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-dark">Aragatnaşyk maglumatlary</h5>

                                <ul class="list-unstyled text-secondary mb-4">
                                    <li class="mb-3">
                                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                                        Aşgabat, Türkmenistan
                                    </li>
                                    <li class="mb-3">
                                        <i class="bi bi-telephone-fill text-primary me-2"></i>
                                        +993 61 12 34 56
                                    </li>
                                    <li class="mb-3">
                                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                                        info@mysite.tm
                                    </li>
                                    <li>
                                        <i class="bi bi-clock-fill text-primary me-2"></i>
                                        Duşenbe - Şenbe: 09:00 - 18:00
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
