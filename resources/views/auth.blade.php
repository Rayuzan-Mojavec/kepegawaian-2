@extends('core.welcome')

@section('core-part')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5 text-center">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin flex justify-content-center">
                <h1 class="h3 mb-3 fw-normal text-center">Masuk</h1>

                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="username" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control mt-2" id="password">
                    </div>

                    <button class="btn  btn-primary text-center mt-3 " type="submit">Log in</button>

                </form>
            </main>
        </div>
    </div>
@endsection
