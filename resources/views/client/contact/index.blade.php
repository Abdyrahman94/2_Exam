@extends('client.layouts.app')

@section('content')
    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h2 class="fw-bold text-center mb-5 text-primary">
                    {{ __('app.Contact Us') }}
                </h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="card shadow-sm  rounded-4 h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-dark">{{ __('app.Form for sending us your letter') }}</h5>

                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('app.Your name') }}</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Adyňyzy giriziň" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('app.Your email address') }}</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="example@email.com" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">{{ __('app.Your phone number') }}</label>
                                        <input type="text" id="phone" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="+993 00 00 00 00" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">{{ __('app.Your letter') }}</label>
                                        <textarea id="message" name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Hatyňyzy şu ýere ýazyň..." required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                            <i class="bi bi-send-fill me-2"></i> {{ __('app.Submit') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow-sm rounded-4 h-100 bg-light">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-dark">{{ __('app.Contact information') }}</h5>

                                <ul class="list-unstyled text-secondary mb-4">
                                    <li class="mb-3">
                                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                                        {{__('app.Ashgabat, Turkmenistan')}}
                                    </li>
                                    <li class="mb-3">
                                        <i class="bi bi-telephone-fill text-primary me-2"></i>
                                        +993 (65) 22 96 69
                                    </li>
                                    <li class="mb-3">
                                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                                        example@gmail.com
                                    </li>
                                    <li>
                                        <i class="bi bi-clock-fill text-primary me-2"></i>
                                        Duşenbe - Şenbe: 09:00 - 18:00
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
