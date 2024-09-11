@extends('layouts.kasir')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <h5 class="card-header fw-bold title ms-3">{{ __('Register') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input id="nama_pengguna" type="text"
                                    class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna"
                                    value="{{ old('nama_pengguna') }}" required autocomplete="nama_pengguna" autofocus
                                    placeholder="Masukan Nama" aria-describedby="floatingInputHelp" />
                                @error('nama_pengguna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="nama_pengguna">Nama Pengguna</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="nama_toko" type="text"
                                    class="form-control @error('nama_toko') is-invalid @enderror" name="nama_toko"
                                    value="{{ old('nama_toko') }}" required autocomplete="nama_toko" autofocus
                                    placeholder="Masukan Nama Toko" aria-describedby="floatingInputHelp" />
                                @error('nama_toko')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="nama_toko">Nama Toko</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="email" type="email"
                                     class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Masukan Email" aria-describedby="floatingInputHelp" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="password" type="password"
                                     class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"
                                    placeholder="Masukan Password" aria-describedby="floatingInputHelp" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password"
                                     class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Masukan Password" aria-describedby="floatingInputHelp" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password-confirm">Konfirmasi Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    {{ __('Register') }}
                                </button>
                            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
