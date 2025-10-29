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

     <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto; /* content-ä ýer berýär */
        }
        footer {
            flex-shrink: 0; /* Footeriň uly bolmagyna ýol berer, aşakda durar */
        }
    </style>
</head>

<body>
    @include('client.partials.app')
    @include('client.partials.nav')
    
    <main class="py-4">
        @yield('content')
    </main>
    
    @include('client.partials.footer')

</body>

</html>
