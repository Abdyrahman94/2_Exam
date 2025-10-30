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
            /* content-ä ýer berýär */
        }

        footer {
            flex-shrink: 0;
            /* Footeriň uly bolmagyna ýol berer, aşakda durar */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartCount = document.getElementById('cart_count');
            const addButtons = document.querySelectorAll('.add-to-cart');

            addButtons.forEach(button => {
                button.addEventListener('click', async function() {
                    const productId = this.dataset.id;

                    try {
                        const response = await fetch(`/cart/add/${productId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                        });

                        if (response.ok) {
                            // San +1
                            let count = parseInt(cartCount.textContent);
                            cartCount.textContent = count + 1;

                            // Düğmäni “Goşuldy” görnüşine geçir
                            this.innerHTML = '<i class="bi bi-check-lg me-2"></i> Goşuldy!';
                            this.classList.remove('btn-outline-primary');
                            this.classList.add('btn-success');
                            this.disabled = true;
                        } else {
                            console.error('Sebede goşmakda säwlik boldy.');
                        }
                    } catch (error) {
                        console.error('Server bilen baglanyşyk ýok:', error);
                    }
                });
            });
        });
    </script>
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
