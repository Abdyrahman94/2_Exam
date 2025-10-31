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
    <nav class="navbar navbar-expand-lg bg-success shadow-sm sticky-top" data-bs-theme="dark">
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
    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-5 bg-light">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    class="img-fluid w-100 h-100 object-fit-cover" alt="{{ $product->name_tm }}">
                            @else
                                <img src="{{ asset('images/no-image.png') }}"
                                    class="img-fluid w-100 h-100 object-fit-cover" alt="No image">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4 d-flex flex-column h-100">
                                <h3 class="fw-bold text-dark">{{ $product->getName() }}</h3>
                                <p class="text-black mb-1 mt-2">
                                    {{ __('app.Place of manufacture') }}:
                                    <span class="fw-semibold">{{ $product->country->name ?? '—' }}</span>
                                </p>
                                <p class="text-black mt-2">
                                    {{ __('app.Category') }}:
                                    <span class="fw-semibold">{{ $product->category->getName() ?? '—' }}</span>
                                </p>
                                <p class="text-black">
                                    {{ __('app.Description') }}:
                                    <span class="fw-semibold">{{ $product->getDescription() }}</span>
                                </p>
                                <div class="mt-auto">
                                    <h4 class="fw-bold text-success mb-3">{{ $product->price }} TMT</h4>
                                    <div class="d-flex">
                                        <a href="{{ route('products.index') }}"
                                            class="btn btn-outline-secondary me-2">
                                            <i class="bi bi-arrow-left me-2"></i> {{ __('app.Back') }}
                                        </a>
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                            class="add-to-cart-form">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary w-100">
                                                <i class="bi bi-basket-fill me-2"></i> {{ __('app.Add cart') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.add-to-cart-form');
            const cartCount = document.getElementById('cart_count');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const action = form.getAttribute('action');
                    const btn = form.querySelector('button');

                    fetch(action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                cartCount.textContent = data.count;
                                btn.innerHTML =
                                    '<i class="bi bi-check-circle-fill me-2"></i> Goşuldy!';
                                btn.classList.remove('btn-outline-primary');
                                btn.classList.add('btn-success');

                                setTimeout(() => {
                                    btn.innerHTML =
                                        '<i class="bi bi-basket-fill me-2"></i> Sebede goş';
                                    btn.classList.remove('btn-success');
                                    btn.classList.add('btn-outline-primary');
                                }, 2000);
                            }
                        })
                        .catch(err => console.error('Error:', err));
                });
            });
        });
    </script>
</body>

</html>
