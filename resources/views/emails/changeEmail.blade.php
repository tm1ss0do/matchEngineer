<div class="p-mailtext">
  <div class="c-mailtext__header">
    <a class="" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
  </div>

  <div class="c-mailtext__body">
    <p class="c-mailtext__text">
      いつもご利用いただきありがとうございます。</br>
      {{ config('app.name') }}事務局です。</br>
      メールアドレス変更を承りました。</br>
    </p>
    <p class="c-mailtext__text">{{ __('下記のURLをクリックして新しいメールアドレスを確定してください。') }}</p>


    <section class="c-btn">
      <a href="{{ $actionUrl }}" class="c-btn__medi js-submit">
        メールアドレス変更
      </a>
    </section>

    <!-- <p>
        {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
    </p> -->
    <p class="c-mailtext__normal">
        {{ __('※URLの有効期限は一時間以内です。有効期限が切れた場合は、お手数ですがもう一度最初からお手続きを行ってください。') }}<br>
    </p>
  </div>
  <div class="c-mailtext__footer">
    <a class="" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
  </div>
</div>
