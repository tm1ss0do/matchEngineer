@extends('layouts.base')

@section('content')

<h3 class="c-title__page text-align u-text-align__center">{{ __('Login') }}</h3>

<div class="p-form__container u-flex u-flex__center">
    <form class="p-form__form--midi" method="POST" action="{{ route('login') }}">
        @csrf
        <section class="c-input__line">
          <label class="c-title__label" for="email">{{ __('E-Mail Address') }}</label></br>
          <input id="email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
              <span class="u-font__error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </section>


        <section class="c-input__line">
          <label class="c-title__label" for="password">{{ __('Password') }}</label></br>
          <input id="password" type="password" class="c-input__text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
              <span class="u-font__error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </section>


        <section class="c-input__line--check">
          <input type="checkbox" class="c-input__check" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="c-title__label--check" for="remember">{{ __('Remember Me') }}</label></br>
        </section>

        <section class="c-btn__panel--column">
          <button type="submit" class="c-btn__submit">
              {{ __('Login') }}
          </button>
          @if (Route::has('password.request'))
              <a class="c-btn__moderate" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
        </section>


    </form>
</div>

<!--

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
