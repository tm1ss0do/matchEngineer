@extends('layouts.base')

@section('title', '案件一覧')

@section('content')
  <!-- ProjectsController
  project indexアクション
  案件一覧ページです。
  Homeでもあります。 -->
    <project-list
    url="{{ url('/') }}"></project-list>


  <!-- search -->
  <section class="p-search">
    <div class="c-search__container--border">
      <span class="c-icon__center"><i class="fas fa-search"></i></span>
      <input class="c-input__text" type="text" placeholder="案件を検索する 例：デザイナー">
    </div>
    <div class="c-search__container">
      <div class="c-search__item--border">
        <select class="c-select" name="">
          <option value="all">全ての案件種別</option>
          <option value="revenue">レベニューシェア</option>
          <option value="single">単発</option>
        </select>
      </div>
      <div class="c-search__item">
        <input class="c-input__check" type="checkbox" name="recruiting" value="1">募集中のみ表示
      </div>
    </div>
    <button class="c-btn__submit" type="submit" name="search">検索</button>
  </section>

  <section class="p-projects__list">
    <div class="c-card">
      <div class="c-card__header">
        <span class="c-card__status">
          <i class="fas fa-comment-alt"></i>
          募集中！
        </span>
        <span class="c-card__status">レベニュー案件</span>
        <p class="c-card__text-sub">募集期限：2020/11/1〜2020/11/15</p>
        <h3 class="c-card__title">
          <a class="c-card__title--link" href="#">
            サンプルタイトル！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！
          </a>
        </h3>
        <span class="c-card__text-emphasis">58,000</span>〜<span class="c-card__text-emphasis">119,000</span>円
      </div>
      <div class="c-card__body">
        <p class="c-card__text">
          3〜5才向けのお子さんを持つ、20〜40代の男女をターゲットにした育児情報サービスのサイトです。
          すでにあるブログサイトのデザインを一新していただきます。デザインからコーディングまでができる方限定です。
          育児や仕事で毎日忙しい方達が癒されるような、優しいデザインが得意な方を募集します。
          未経験者でも大丈夫ですが、ポートフォリオをお持ちの方限定で、お願いします！
        </p>
      </div>
      <div class="c-card__footer">
        <div class="p-profile__mini">
          <div class="c-img__container--mini">
            <img class="c-img__img" src="{{ asset('/img/default_prof.png') }}" alt="">
          </div>
          <a class="c-link__mini" href="#">test_user_1</a>
        </div>
        <div class="c-btn__right">
          <a class="c-btn__medi" href="#">詳細を見る</a>
        </div>
      </div>

    </div>

    <div class="c-card">
      <div class="c-card__header">
        <span class="c-card__status">募集終了</span>
        <span class="c-card__status">単発案件</span>
        <p class="c-card__text-sub">募集期限：2020/11/1〜2020/11/15</p>
        <h3 class="c-card__title">
          <a class="c-card__title--link" href="#">
            サンプルタイトル！デザイナー＆コーダー募集！やわらかい雰囲気が得意な方！1名！
          </a>
        </h3>
        <span class="c-card__text-emphasis">58,000</span>〜<span class="c-card__text-emphasis">119,000</span>円
      </div>
      <div class="c-card__body">
        <p class="c-card__text">
          3〜5才向けのお子さんを持つ、20〜40代の男女をターゲットにした育児情報サービスのサイトです。
          すでにあるブログサイトのデザインを一新していただきます。デザインからコーディングまでができる方限定です。
          育児や仕事で毎日忙しい方達が癒されるような、優しいデザインが得意な方を募集します。
          未経験者でも大丈夫ですが、ポートフォリオをお持ちの方限定で、お願いします！
        </p>
      </div>
      <div class="c-card__footer">
        <div class="p-profile__mini">
          <div class="c-img__container--mini">
            <img class="c-img__img" src="{{ asset('/img/default_prof.png') }}" alt="">
          </div>
          <a class="c-link__mini" href="#">test_user_1</a>
        </div>
        <div class="c-btn__right">
          <a class="c-btn__medi" href="#">詳細を見る</a>
        </div>
      </div>

    </div>






  </section>



@endsection
