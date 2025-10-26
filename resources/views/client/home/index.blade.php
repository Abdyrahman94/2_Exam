<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
</head>

<body>
    <nav class="navbar bg-success">
        <div class="container-lg">
            <a class="navbar-brand text-light fw-bold">{{ __('app.Welcome to EcoStore') }}</a>
            <form class="d-flex align-items-center" role="search">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm"><span
                        class="bi-box-arrow-in-right me-2"></span>{{ __('app.Login') }}</a>
                <a href="{{ route('register') }}"
                    class="btn btn-warning text-light ms-2 me-2 btn-sm">{{ __('app.Register') }} <span
                        class="bi-person-plus"></span></a>
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
    </nav>
    
</body>

</html>
