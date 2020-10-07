@extends('layouts.base')

@section('title', 'パスワードリセット')

@section('content')

<h3 class="c-title__page u-text-align__center">{{ __('Reset Password') }}</h3>

<p class="u-font__sub u-text-align__center">
  パスワードリセット用のリンクを送信します。</br>
  ご登録中のメールアドレスをご入力ください。
</p>
<div class="p-form__container u-flex u-flex__center">

  <form class="p-form__form--midi js-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <section class="c-input__line">
      <label class="c-title__label" for="email">{{ __('E-Mail Address') }}</label></br>
      <input id="email" type="email" class="c-input__text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="u-font__error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </section>

    <section class="c-btn">
      <button type="submit" class="c-btn__submit js-submit">
          送信
      </button>
    </section>

  </form>


</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                  <span class="u-font__error" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
