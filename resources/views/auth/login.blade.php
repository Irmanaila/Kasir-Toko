@extends('layouts.kasir')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-5">
                <div class="card">
                    <h5 class="card-header fw-bold title ms-3">{{ __('Login') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus id="floatingInput"
                                    placeholder="Masukan Email" aria-describedby="floatingInputHelp" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label for="floatingInput">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password" 
                                    placeholder="Masukan Password" aria-describedby="floatingInputHelp" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label for="password">{{ __('Password') }}</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="mb-0 ps-0 text-dark d-flex align-items-center text-nowrap" href="{{ route('register') }}">Belum mempunyai akun?
                                    <span class="btn btn-link ps-1 pe-0">Register</span> 
                                </a>
                                <button type="submit" class="btn btn-primary btn-sm ">
                                    {{ __('Login') }}
                                </button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
