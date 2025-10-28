@extends('client.layouts.app')

@section('content')
    <div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Surat bölegi --}}
                    <div class="col-md-5 bg-light">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="img-fluid w-100 h-100 object-fit-cover" 
                                 alt="{{ $product->name_tm }}">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" 
                                 class="img-fluid w-100 h-100 object-fit-cover" 
                                 alt="No image">
                        @endif
                    </div>

                    {{-- Maglumat bölegi --}}
                    <div class="col-md-7">
                        <div class="card-body p-4 d-flex flex-column h-100">
                            <h3 class="fw-bold text-dark">{{ $product->name_tm }}</h3>
                            <p class="text-muted mb-1">{{ $product->country->name ?? '—' }}</p>
                            <p class="text-secondary small mb-3">
                                Kategoriýa: 
                                <span class="fw-semibold">{{ $product->category->name_tm ?? '—' }}</span>
                            </p>

                            @if ($product->description_tm)
                                <p class="mt-3 text-dark">{{ $product->description_tm }}</p>
                            @else
                                <p class="mt-3 text-muted fst-italic">Düşündiriş ýok.</p>
                            @endif

                            <div class="mt-auto">
                                <h4 class="fw-bold text-success mb-3">{{ $product->price }} TMT</h4>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary w-100 me-2">
                                        <i class="bi bi-basket-fill me-2"></i> Sebede goş
                                    </button>
                                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-arrow-left me-2"></i> Yza
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Başga degişli harytlar --}}
            @if ($product->category && $product->category->products->count() > 1)
                <div class="mt-5">
                    <h5 class="fw-bold mb-3">Meňzeş harytlar:</h5>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($product->category->products->where('id', '!=', $product->id)->take(3) as $related)
                            <div class="col">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <a href="{{ route('products.show', $related->slug) }}" class="ratio ratio-1x1 d-block bg-light">
                                        <img src="{{ asset('storage/' . $related->image) }}" 
                                             class="card-img-top object-fit-cover" 
                                             alt="{{ $related->name_tm }}">
                                    </a>
                                    <div class="card-body">
                                        <h6 class="fw-bold">{{ $related->name_tm }}</h6>
                                        <p class="text-success fw-semibold small mb-0">{{ $related->price }} TMT</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection