<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
</head>
<body>
    <div class="container-xxl">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <form action="{{ route('register') }}" method="post" class="col-10 col-md-8 col-lg-6 col-xl-4">
                <div class="h2 fw-bold text-center mb-4 mt-5">{{ __('app.Register') }}</div>
                @csrf
                <div class="border border-secondary-subtle rounded-3 p-4 shadow-lg">
                    <div class="w-100  mt-3">
                        <label for="name" class="h6 form-label">{{ __('app.Name') }}<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control @error('name') border-danger @enderror" name="name"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-100 mt-3">
                        <label for="username" class="h6 form-label">{{ __('app.Username') }}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('username') border-danger @enderror" name="username"
                            id="username" value="{{ old('username') }}">
                        @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
                    <div class="w-100 mt-3">
                        <label for="email" class="h6 form-label">{{ __('app.Email') }}<span class="text-danger">*</span> </label>
                        <input type="email" class="form-control @error('email') border-danger @enderror" name="email"
                            id="email" value="{{ old('email') }}">
        
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
                    <div class="w-100 mt-3">
                        <label for="password" class="h6 form-label">{{ __('app.Password') }}<span class="text-danger">*</span> </label>
                        <input type="password" id="password @error('password') border-danger @enderror" name="password"
                            class="form-control">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
                    <div class="w-100 mt-3">
                        <label for="password_confirmation" class="h6 form-label">{{ __('app.Password confirmation') }}<span
                                class="text-danger">*</span> </label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control  @error('password_confirmation') border-danger @enderror">
                        @error('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
