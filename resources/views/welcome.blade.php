@extends('layouts.base')

@section('title', 'welcomeページ')

@section('scripts')
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
@endsection

@section('hero')

<!-- **************************** -->
<!-- hero hedder -->
<div class="p-hero__container">
  <section class="p-hero__wrap u-text-align--center">
    <p class="c-title--sub">エンジニアをもっと身近に</p>
    <h2 class="c-title--header-logo u-font--xl">match</h2>
    <p class="c-title--small">誰でも、簡単、手軽に、システム開発</p>
    <div class="c-btn__panel--column">
      <a class="c-btn--medi" href="{{ route('register') }}">無料登録はこちら</a>
      <a class="c-btn--moderate" href="{{ route('login') }}">ログイン</a>
    </div>
  </section>
</div>

@endsection

@section('content')



<!-- **************************** -->
<!-- サービスの概要説明 -->

<div class="p-welcome__container">

  <section class="c-text__cotainer u-flex--column">
    <h2 class="c-title--section">「誰でも」「簡単に」参加できる</h2>
    <p class="u-font--sub">matchは、誰でも簡単に技術に触れられることを目指した、エンジニアとのマッチングサービスです。</p>
  </section>

  <div class="p-side-box">

    <section class="c-side-box__container">
      <div class="c-card--half u-width--half">
        <h3 class="c-card__title u-color--main">気軽に相談できる</h3>
        <div class="c-card__body">
          「子どもが楽しんで学べるような機能が欲しい」</br>
          「こんな機能があれば、毎日の家事をもっと楽にできるのに」</br>
          「デザインの相談に乗って欲しい」</br>
          「ワードプレスのカスタマイズ方法を教えて」</br>
          「プログラミング学習の相談に乗って欲しい」</br>
           日常のちょっとした困り事もご相談できます。
        </div>
      </div>
      <div class="c-img__container--sqhalf u-width--half">
        <img class="c-img__img" src="{{ secure_asset('/img/soudan-1.jpg') }}" alt="soudan-1.jpg">
      </div>
    </section>

    <section class="c-side-box__container u-display--md">
      <div class="c-img__container--sqhalf u-width--half">
        <img class="c-img__img" src="{{ secure_asset('/img/soudan-2.jpg') }}" alt="soudan-1.jpg">
      </div>
      <div class="c-card--half u-width--half">
        <h3 class="c-card__title u-color--main">
          １０個の項目を埋めるだけ！</br>
          空いている時間に案件登録
        </h3>
        <div class="c-card__body">
          ややこしい単語、複雑な項目の一切を省略。</br>
          家事の合間に10項目埋めるだけで案件の登録が完了。</br>
          あとは応募を待つだけです。</br>
          「エンジニア案件って難しそう」と思っている方でも、簡単に発注できます。
        </div>
      </div>
    </section>

    <section class="c-side-box__container u-display--sm">
      <div class="c-card--half u-width--half">
        <h3 class="c-card__title u-color--main">
          １０個の項目を埋めるだけ！</br>
          空いている時間に案件登録
        </h3>
        <div class="c-card__body">
          ややこしい単語、複雑な項目の一切を省略。</br>
          家事の合間に10項目埋めるだけで案件の登録が完了。</br>
          あとは応募を待つだけです。</br>
          「エンジニア案件って難しそう」と思っている方でも、簡単に発注できます。
        </div>
      </div>
      <div class="c-img__container--sqhalf u-width--half">
        <img class="c-img__img" src="{{ secure_asset('/img/soudan-2.jpg') }}" alt="soudan-1.jpg">
      </div>
    </section>

    <section class="c-side-box__container">
      <div class="c-card--no-boarder--half u-width--half">
        <h3 class="c-card__title u-color--main">
          レベニューシェア案件にも対応</br>
          強力なパートナー探しに
        </h3>
        <div class="c-card__body">
          単発案件のほか、レベニューシェア案件にも対応。</br>
          強力なビジネスパートナーを見つけたい方にもおすすめです。</br>
          「こんなサービスがあれば、もっと大きく育てられるのに」</br>
          「作りたいサービスがあるのに、時間が足りない」</br>
          パートナーとなるエンジニアを見つけ、頭の中に浮かんだアイデアを形にしましょう。
        </div>
      </div>
      <div class="c-img__container--sqhalf u-width--half">
        <img class="c-img__img" src="{{ secure_asset('/img/soudan-3.jpg') }}" alt="soudan-1.jpg">
      </div>
    </section>

  </div>

  <div class="c-btn__panel">
    <a class="c-btn--medi" href="{{ route('register') }}">無料登録はこちら</a>
  </div>

</div>




<!-- **************************** -->
<!-- サービスの利用方法説明 -->
<div class="p-welcome__container">

  <section class="c-text__cotainer u-flex--column">
    <h2 class="c-title--section">matchするまでの３ステップ</h2>
  </section>

  <div class="p-side-box">
    <div class="c-side-box__container">
      <section class="p-desc__container">
        <div class="c-card--no-boarder">
          <h3 class="c-card__title">
            <span class="u-font--num">１</span>
            まずは無料登録
          </h3>
          <div class="c-card__body--desc">
            入力するのは、</br>
            メールアドレス・パスワード・表示名</br>
            の３つだけ。</br>
            無料登録完了後、登録された案件へ応募できます。
          </div>
        </div>
        <div class="c-img__container--sqwide">
          <img class="c-img__img" src="{{ secure_asset('/img/desc-1.jpg') }}" alt="soudan-1.jpg">
        </div>
      </section>

      <section class="p-desc__container">
        <div class="c-card--no-boarder">
          <h3 class="c-card__title">
            <span class="u-font--num">２</span>
            発注・応募
          </h3>
          <div class="c-card__body--desc">
            お仕事を発注する際は、入力フォームで10の項目を埋めるだけで完了。</br>
            気になったお仕事には、メッセージを送るだけで応募できます。</br>

          </div>
        </div>
        <div class="c-img__container--sqwide">
          <img class="c-img__img" src="{{ secure_asset('/img/desc-2.jpg') }}" alt="soudan-1.jpg">
        </div>
      </section>

      <section class="p-desc__container">
        <div class="c-card--no-boarder">
          <h3 class="c-card__title">
            <span class="u-font--num">３</span>
            マッチング
          </h3>
          <div class="c-card__body--desc">
            それぞれの条件に合う方とマッチング。</br>
            お仕事の詳細は、非公開メッセージでやりとりができます。

          </div>
        </div>
        <div class="c-img__container--sqwide">
          <img class="c-img__img" src="{{ secure_asset('/img/desc-3.jpg') }}" alt="soudan-1.jpg">
        </div>
      </section>
    </div>
    <div class="c-btn__panel">
      <a class="c-btn--medi" href="{{ route('register') }}">無料登録はこちら</a>
    </div>

  </div>
</div>

@endsection
@section('back')

@endsection
