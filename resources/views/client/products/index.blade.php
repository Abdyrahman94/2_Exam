@extends('client.layouts.app')

@section('content')
    <div class="container-lg py-5">
        <div class="row">
            <div class="col-3">
                <form action="{{ route('products.index') }}" method="get" class="me-3">
                    @csrf
                    <label for="drink" class="form-label mt-1">Drinks: </label>
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
                    <label for="snack" class="form-label mt-2">Snacks: </label>
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
                    <label for="sweet" class="form-label mt-2">Sweets: </label>
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
                    <label for="fruit" class="form-label mt-2">Fruits: </label>
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
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary w-50 me-2">
                            <i class="bi bi-funnel-fill me-1"></i> Submit
                        </button>

                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-50">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>


            <div class="col-lg-9">
                <h4 class="fw-bold mb-4 text-center text-dark">Harytlar</h4>
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
                                    <p class="text-muted small">{{ $product->country->name ?? '—' }}</p>
                                    <div class="mt-auto">
                                        <p class="fw-bold text-success mb-2">{{ $product->price }} TMT</p>
                                        <button type="button" class="btn btn-outline-primary w-100">
                                            <i class="bi bi-basket-fill me-2"></i> Sebede goş
                                        </button>
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
    @endsection
