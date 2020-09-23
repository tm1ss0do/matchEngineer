<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>match | @yield('title', 'Home')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/match_blue_logo.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">


    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <!-- フラッシュメッセージ -->
       @if (session('flash_message'))
           <div class="">
               {{ session('flash_message') }}
           </div>
       @endif

    <header id="header" class="l-header">
      <div class="c-header__container">
        <h1 class="c-title__header-logo">
          <a class="c-title__header-link" href="#">match</a>
        </h1>
        <nav class="c-nav__right">
            @if (Route::has('login'))
              <div class="c-nav__container">
                @auth
                <!-- ログインしていた場合 -->
                <a class="c-nav__item--top" href="{{ url('/home') }}">
                  <i class="fas fa-home"></i>
                  Home
                </a>
                <a class="c-nav__item--top" href="#">
                  <i class="fas fa-clipboard-list"></i>
                  案件を探す
                </a>
                <a class="c-nav__item--top" href="#">
                  <i class="far fa-user"></i>
                  マイページ
                </a>
                <a class="c-nav__item--top" href="#">
                  <i class="far fa-handshake"></i>
                  依頼する
                </a>
                @else
                <!-- ゲストの場合 -->
                <a class="c-nav__item--top" href="#">
                  <i class="fas fa-clipboard-list"></i>
                  案件を見てみる
                </a>
                <a class="c-nav__item--top" href="{{ route('login') }}">
                  <i class="fas fa-sign-in-alt"></i>
                  ログイン
                </a>

                  @if (Route::has('register'))
                  <a class="c-nav__item--top" href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i>
                    新規登録
                  </a>
                  @endif

                @endauth
              </div>
            @endif
        </nav>
      </div>
      @if (session('status'))
          <div class="c-session-msg">
              {{ session('status') }}
              例文メッセージです：登録しました！
          </div>
      @endif
    </header>


    <main id="main" class="l-main">
      <div class="l-main__wrap">
        @yield('content')
      </div>

      <pagetop-component></pagetop-component>

      <!-- <div class="c-page-top"><a href="#"></a></div> -->


    </main>

    <footer class="l-footer">
      <nav class="c-nav">
          @if (Route::has('login'))
            <div class="c-nav__container">
              @auth
              <!-- ログインしていた場合 -->
              <a class="c-nav__item--top" href="{{ url('/home') }}">
                <i class="fas fa-home"></i>
                Home
              </a>
              <a class="c-nav__item--small" href="#">
                <i class="fas fa-clipboard-list"></i>
                案件を探す
              </a>
              <a class="c-nav__item--small" href="#">
                <i class="far fa-user"></i>
                マイページ
              </a>
              <a class="c-nav__item--small" href="#">
                <i class="far fa-handshake"></i>
                依頼する
              </a>
              @else
              <!-- ゲストの場合 -->
              <a class="c-nav__item--small" href="#">
                <i class="fas fa-clipboard-list"></i>
                案件を見てみる
              </a>
              <a class="c-nav__item--small" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i>
                ログイン
              </a>

                @if (Route::has('register'))
                <a class="c-nav__item--small" href="{{ route('register') }}">
                  <i class="fas fa-user-plus"></i>
                  新規登録
                </a>
                @endif

              @endauth
            </div>
          @endif
      </nav>
      <p class="text-align__center font__ss" >©︎WEBUKATU,created by Tomomi Sasaki</p>
    </footer>
  </div>
  <input class="input" id="myCal" type="text" />

</body>

</html>
