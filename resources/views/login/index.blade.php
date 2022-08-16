@extends('layout/main')

@section('title', 'Login')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-md-3">

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <main class="form-signin">
                <p class="h2 mt-5 text-center">Welcome!</p>
                <p class="h5 mt-2 text-center">Enter your email and password to login</p>

                        <div class="card" id="cardlogin" >
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                            <form action="/login" method="post">
                                            @csrf
                                            <div class="form-floating mt-4">
                                            <input type="email" name="email"class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required
                                            value="{{ old('email') }}">
                                            <label for="email">Email</label>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                            <label for="password">Password</label>
                                            </div>
                                            <button class="w-100 btn btn-lg btn-primary mt-2 mb-4" type="submit">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


        <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!<a></small>
        </main>
    </div>
</div>
@endsection