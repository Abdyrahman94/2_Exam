@extends('client.layouts.app')

@section('content')
    <div class="container-lg py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('storage/img/About banner.jpg') }}" class="w-100 rounded-4 shadow-sm"
                    alt="About our company">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold text-dark mb-3">{{ __('app.About Our Company') }}</h2>
                <p class="text-muted mb-3">
                    We are a passionate team dedicated to bringing quality products and exceptional service
                    to our customers. Our goal is to make your shopping experience simple, enjoyable, and reliable.
                </p>
                <p class="text-muted mb-4">
                    Since our founding, we have focused on providing the best selection, affordable prices,
                    and trustworthy support. Every product we offer is chosen with care and attention to detail.
                </p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary px-4">
                    <i class="bi bi-envelope-fill me-2"></i> {{ __('app.Contact Us') }}
                </a>
            </div>
        </div>
    </div>
@endsection
