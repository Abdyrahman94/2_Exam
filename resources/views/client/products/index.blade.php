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
        <div class="row">
            <div class="col-3">
                <form action="{{ route('products.index') }}" method="get" class="me-3">
                    @csrf
                    <label for="drink" class="form-label mt-4">{{ __('app.Drinks') }}: </label>
                    <select class="form-select mb-2" name="drink" id="drink">
                        <option value="">-</option>
                        @foreach ($categories->where('type', 'drink') as $category)
                            @foreach ($category->products as $productOption)
                                <option value="{{ $productOption->id }}"
                                    {{ (int) request('drink') === $productOption->id || (isset($f_drink) && $f_drink == $productOption->id) ? 'selected' : '' }}>
                                    {{ $productOption->name_tm ?? $productOption->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    <label for="snack" class="form-label mt-1">{{ __('app.Snacks') }}: </label>
                    <select class="form-select mb-2" name="snack" id="snack">
                        <option value="">-</option>
                        @foreach ($categories->where('type', 'snack') as $category)
                            @foreach ($category->products as $productOption)
                                <option value="{{ $productOption->id }}"
                                    {{ (int) request('snack') === $productOption->id || (isset($f_snack) && $f_snack == $productOption->id) ? 'selected' : '' }}>
                                    {{ $productOption->name_tm ?? $productOption->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    <label for="sweet" class="form-label mt-1">{{ __('app.Sweets') }}: </label>
                    <select class="form-select mb-2" name="sweet" id="sweet">
                        <option value="">-</option>
                        @foreach ($categories->where('type', 'sweet') as $category)
                            @foreach ($category->products as $productOption)
                                <option value="{{ $productOption->id }}"
                                    {{ (int) request('sweet') === $productOption->id || (isset($f_sweet) && $f_sweet == $productOption->id) ? 'selected' : '' }}>
                                    {{ $productOption->name_tm ?? $productOption->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    <label for="fruit" class="form-label mt-1">{{ __('app.Fruits') }}: </label>
                    <select class="form-select mb-3" name="fruit" id="fruit">
                        <option value="">-</option>
                        @foreach ($categories->where('type', 'fruit') as $category)
                            @foreach ($category->products as $productOption)
                                <option value="{{ $productOption->id }}"
                                    {{ (int) request('fruit') === $productOption->id || (isset($f_fruit) && $f_fruit == $productOption->id) ? 'selected' : '' }}>
                                    {{ $productOption->name_tm ?? $productOption->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    <div class="d-flex mt-4">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-send me-1"></i> {{ __('app.Submit') }}
                        </button>

                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> {{ __('app.Reset') }}
                        </a>
                    </div>
                </form>
            </div>


            <div class="col-lg-9">
                <h4 class="fw-bold mb-4 text-center text-dark">{{ __('app.Products') }}</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100 border-secondary shadow-sm rounded-4 overflow-hidden">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="ratio ratio-1x1 d-block bg-light">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="card-img-top object-fit-cover" alt="{{ $product->name_tm }}">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">{{ $product->name_tm }}</h5>
                                    <div class="mt-auto">
                                        <p class="fw-bold text-success mb-2">{{ $product->price }} TMT</p>
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
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
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
