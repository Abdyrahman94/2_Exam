@extends('client.layouts.app')

@section('content')
    <div class="container-lg py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="{{ route('products.index') }}" method="get" class="d-flex mt-4">
                    <input type="text" name="q" class="form-control me-2 rounded-5 py-3"
                        placeholder="Search products..." value="{{ request('q') }}">
                    <button type="submit" class="btn btn-primary rounded-5">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="mb-5">
            <h3 class="fw-bold text-dark mb-4 text-center">{{ __('app.New Products') }}</h3>
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
        </div>
    </div>
@endsection
