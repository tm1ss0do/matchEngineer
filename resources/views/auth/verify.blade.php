@extends('layouts.base')

@section('title', 'メールをご確認ください')

@section('scripts')
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
@endsection

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

      <section class="c-btn__panel--column">
        <button type="submit" class="c-btn__medi js-submit">
          {{ __('click here to request another') }}
        </button>
        <a href="{{ route('email.email_edit_form', ['id' => Auth::id()]) }}" class="c-btn__moderate js-submit">
          ご登録時のメールアドレスをお間違えの方はこちら
        </a>
      </section>
    </form>
  </div>
</div>

@endsection
