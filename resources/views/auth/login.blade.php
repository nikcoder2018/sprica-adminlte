@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <main class="form-signin">
                <form action="{{ route('login') }}" method="post" class="text-center">
                    @csrf
                    <img style="; width: 73%" src="{{asset('/img/logo2.jpg')}}"><br>
                    <h1 class="h3 mb-3 fw-normal">{{__('Zeiterfassung')}}</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">{{ __('Email') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">{{ __('Password') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
                    <p class="mt-5 mb-3 text-muted">&copy; Sprica Brandschutz 2021</p>
                </form>
            </main>
        </div>
    </div>
</div>
@endsection
