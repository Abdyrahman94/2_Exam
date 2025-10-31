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
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
            
        }

        footer {
            flex-shrink: 0;
            
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
