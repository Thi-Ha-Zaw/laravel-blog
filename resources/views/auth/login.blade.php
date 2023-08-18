@extends('layouts.app')

@section('content')

    {{-- login --}}

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center  h-100">
                <div class="col col-xl-8">
                    <div class="card border-0 shadow">
                        <div class="row g-0">
                            <div class=" col-md-6 col-lg-5 d-flex justify-content-center align-items-center">
                                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_nc1bp7st.json"
                                    background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                                    autoplay></lottie-player>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div
                                            class="d-flex
                                        align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">
                                            </span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3 fs-3" style="letter-spacing: 1px;">Sign into your
                                            account
                                        </h5>

                                        <div class="mb-4">
                                            <div class="form-outline">

                                                <input type="email" id="form2Example17"
                                                    class="form-control mb-0 form-control-lg @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" />
                                                <label class="form-label" for="form2Example17">Email address</label>

                                            </div>
                                            @error('email')
                                                <div class=" text-danger ">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" required
                                                autocomplete="current-password" />
                                            <label class="form-label" for="form2Example27">Password</label>

                                        </div>
                                        @error('password')
                                            <span class=" text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a class="small text-muted" href="{{ route('password.request') }}">Forgot
                                                password?</a>
                                        @endif

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="{{ route('register') }}" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
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
