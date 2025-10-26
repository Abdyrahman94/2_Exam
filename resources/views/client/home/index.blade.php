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
    <div class="container-lg">
        <div class="d-flex justify-content-center pt-5">
            <a href="{{ route('locale', 'tm') }}" class="text-decoration-none me-3 btn btn-outline-primary btn-sm">
                <img src="  https://gnbookstore.com.tm/img/flag/tkm.png" alt="Türkmen">Turkmenish
            </a>
            <a href="{{ route('locale', 'en') }}"class="text-decoration-none me-3 btn btn-outline-primary btn-sm">
                <img src="https://gnbookstore.com.tm/img/flag/eng.png" alt="English">English
            </a>
            <a href="{{ route('locale', 'ru') }}"class="text-decoration-none me-3 btn btn-outline-primary btn-sm">
                <img src="https://gnbookstore.com.tm/img/flag/rus.png" alt="Русский">Russian
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center" style="height: 75vh">
            <div class="">
                <div class="display-3 text-success fw-bold">
                    {{ __('app.EcoStore') }}
                </div>
                <div class="d-flex justify-content-center mt-3 ">
                    <a href="{{ route('login') }}" class="btn btn-primary"><span
                            class="bi-box-arrow-in-right me-2"></span>{{ __('app.Login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-warning ms-2">{{ __('app.Register') }} <span
                            class="bi-person-plus"></span></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
