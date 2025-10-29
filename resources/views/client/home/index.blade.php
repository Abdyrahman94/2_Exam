@extends('client.layouts.app')

@section('content')
    <div class="container-lg py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="{{ route('products.index') }}" method="GET" class="d-flex shadow-sm rounded-5">
                    <input type="text" name="search" class="form-control me-2 rounded-5" placeholder="Haryt gözläň..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary rounded-5" type="submit"><span class="bi bi-search"></span></button>
                </form>
            </div>
        </div>

        {{-- 🛍️ Täze harytlar --}}
        <div class="mb-5">
            <h3 class="fw-bold text-dark mb-4 text-center">Täze harytlar</h3>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100 border-secondary shadow-sm rounded-4 overflow-hidden">
                            <a href="{{ route('products.show', $product->slug) }}" class="ratio ratio-1x1 bg-light d-block">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="card-img-top object-fit-cover" alt="{{ $product->name_tm }}">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="card-img-top object-fit-cover"
                                        alt="No image">
                                @endif
                            </a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $product->name_tm }}</h5>
                                <div class="mt-auto">
                                    <p class="fw-bold text-success mb-2">{{ $product->price }} TMT</p>
                                    <form action="" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary w-100">
                                            <span class="bi bi-basket-fill me-2"></span>Sebede goş
                                        </button>
                                        {{-- {{ route('cart.add', $product->id) }} --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
