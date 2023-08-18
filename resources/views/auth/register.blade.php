@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class=" text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <section class="vh-100">
        <div class="container pb-5 h-100">
            <div class="row d-flex justify-content-center mt-5  h-100">
                <div class="col col-xl-8">
                    <div class="card border-0 shadow">
                        <div class="row g-0">
                            <div class=" col-md-6 col-lg-5 d-flex justify-content-center align-items-center">
                                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_m9fz64i8.json"
                                    background="transparent" speed="1" style="width: 400px; height: 400px;" loop
                                    autoplay></lottie-player>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body px-4 px-lg-5 text-black">

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div
                                            class="d-flex
                                    align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">
                                            </span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3 fs-3" style="letter-spacing: 1px;">Register to your
                                            account
                                        </h5>

                                       <div class="mb-4">
                                        <div class="form-outline">

                                            <input type="text" id="form2Example17"
                                                class="form-control mb-0 form-control-lg @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name" />
                                            <label class="form-label" for="form2Example17">Your Name</label>

                                        </div>
                                        @error('name')
                                                <div class=" text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                       </div>

                                        <div class="mb-4">
                                            <div class="form-outline">

                                                <input
                                                type="email"
                                                id="form2Example17"
                                                pattern=".+@ucsm\.edu\.mm"
                                                class="form-control mb-0 form-control-lg @error('email') is-invalid @enderror"
                                                name="email"
                                                value="{{ old('email') }}"
                                                required autocomplete="email"
                                                />
                                                <label class="form-label" for="form2Example17">Email address</label>
                                            </div>
                                            @error('email')
                                            <div class=" text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                        <div class="mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="form2Example27"
                                                    class="form-control mb-0 form-control-lg @error('password') is-invalid @enderror"
                                                    name="password" value="{{ old('password') }}" required
                                                    autocomplete="new-password" />
                                                <label class="form-label" for="form2Example27">Password</label>

                                            </div>
                                            @error('password')
                                            <div class=" text-danger" >
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                       <div class="mb-4">
                                        <div class="form-outline">
                                            <input type="password" id="form2Example27"
                                                class="form-control mb-0 form-control-lg @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}" required
                                                autocomplete="new-password" />
                                            <label class="form-label" for="form2Example27">Password_confirmation</label>
                                            @error('password_confirmation')
                                                <div class=" text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                       </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                                        </div>


                                        <p class="" style="color: #393f81;">Do you have an account? <a
                                                href="{{ route('login') }}" style="color: #393f81;">Login here</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
