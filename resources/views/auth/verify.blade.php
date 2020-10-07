@extends('layouts.base')

@section('title', 'メールをご確認ください')

@section('content')

<h3 class="c-title__page text-align u-text-align__center">{{ __('Verify Your Email Address') }}</h3>

<div class="p-form__container u-flex u-flex__center">
  <div class="card-body">
    @if (session('resent'))
    <span class="u-font__success" role="alert">
      <strong>{{ __('A fresh verification link has been sent to your email address.') }}</strong>
    </span>
    @endif
    <p class="">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
    <p class="">{{ __('If you did not receive the email') }}</p>

    <form class="p-form__form--midi js-form" method="POST" action="{{ route('verification.resend') }}">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

      <section class="c-btn">
        <button type="submit" class="c-btn__medi js-submit">
          {{ __('click here to request another') }}
        </button>
      </section>
    </form>
  </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline js-form" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <button type="submit" class="js-submit">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
