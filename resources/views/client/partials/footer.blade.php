<div id="pageFooter">
    <div class="bg-info-subtle text-primary-emphasis">
        <div class="container-xxl py-4 py-sm-5">
            <div class="row g-4 justify-content-between">
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('home.index') }}">
                        <img src="{{ asset('img/Ecostore.png') }}" class="rounded-5" alt="" style="height:4rem;">
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('contact.index') }}" class="d-block link-dark text-decoration-none mb-2 mb-sm-3"
                        data-bs-toggle="modal" data-bs-target="#contactModal">
                        <i class="bi-envelope me-2"></i>{{ __('app.Contact Us') }}</a>
                    <div class="text-body my-2 my-sm-3">
                        <i class="bi-geo-alt"></i> Magtymguly avenue 73, Ashgabat
                    </div>
                    <a href="tel:+99365229669" class="d-block link-dark text-decoration-none my-2 my-sm-3">
                        <i class="bi-telephone"></i> +993 (65) 22 96 69
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3 text-dark">
                    <h5 class="fw-bold">{{ __('app.Social Media') }}</h5>
                    <p class="mt-3">{{ __('app.Stay in touch with us') }}:</p>
                    <a href="https://github.com/Abdyrahman94" class="text-dark me-3 fs-4"><i
                            class="bi bi-github small"></i></a>
                    <a href="https://www.tiktok.com/@abdyrahman_94" class="text-dark me-3 fs-4"><i
                            class="bi bi-tiktok small"></i></a>
                    <a href="#" class="text-dark me-3 fs-4"><i class="bi bi-instagram small"></i></a>
                    <a href="#" class="text-dark fs-4"><i class="bi bi-linkedin small"></i></a>
                </div>
            </div>
            <hr>
            <div class="text-dark text-center mt-2">2025 EcoStore. {{ __('app.All rights reserved') }}.</div>
        </div>
    </div>
</div>
