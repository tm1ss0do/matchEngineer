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

    <!-- twitter share -->
    <script>
    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
    </script>

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
          <a class="c-title__header-link" href="{{ route('project.all') }}">match</a>
        </h1>
        <nav class="c-nav__right">
            @if (Route::has('login'))
              <div class="c-nav__container">
                @auth
                <!-- ログインしていた場合 -->
                <a class="c-nav__item--top" href="{{ url('/home') }}">
                  <i class="fas fa-home"></i>
                  <span class="c-nav__text">Home</span>
                </a>

                <a class="c-nav__item--top" href="{{ route('project.new') }}">
                  <i class="far fa-handshake"></i>
                  <span class="c-nav__text">依頼する</span>
                </a>
                <a class="c-nav__item--top" href="{{ route('mypage.registered') }}">
                  <i class="far fa-user"></i>
                  <span class="c-nav__text">マイページ</span>

                </a>
                    <div class="">
                        <a class="c-nav__item--top" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('js-logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="c-nav__text">{{ __('Logout') }}</span>
                        </a>
                        <form id="js-logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>

                @else
                <!-- ゲストの場合 -->
                <a class="c-nav__item--top" href="{{ route('project.all') }}">
                  <i class="fas fa-clipboard-list"></i>
                  <span class="c-nav__text">案件を見てみる</span>
                </a>
                <a class="c-nav__item--top" href="{{ route('login') }}">
                  <i class="fas fa-sign-in-alt"></i>
                  <span class="c-nav__text">ログイン</span>

                </a>

                  @if (Route::has('register'))
                  <a class="c-nav__item--top" href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i>
                    <span class="c-nav__text">新規登録</span>
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

      <div class="c-btn__panel--left">
        <a class="c-btn__moderate" href="{{ url()->previous() }}"><<戻る</a>
      </div>

      <pagetop-component></pagetop-component>

    </main>

    <footer class="l-footer">
      <nav class="c-nav">
          @if (Route::has('login'))
            <div class="c-nav__container">
              @auth
              <!-- ログインしていた場合 -->
              <a class="c-nav__item--top" href="{{ url('/home') }}">
                <i class="fas fa-home"></i>
                <span class="c-nav__text">Home</span>
              </a>
              <a class="c-nav__item--small" href="{{ route('mypage.registered') }}">
                <i class="far fa-user"></i>
                <span class="c-nav__text">マイページ</span>

              </a>
              <a class="c-nav__item--small" href="{{ route('project.new') }}">
                <i class="far fa-handshake"></i>
                <span class="c-nav__text">依頼する</span>

              </a>
              @else
              <!-- ゲストの場合 -->
              <a class="c-nav__item--small" href="{{ route('project.all') }}">
                <i class="fas fa-clipboard-list"></i>
                <span class="c-nav__text">案件を見てみる</span>

              </a>
              <a class="c-nav__item--small" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i>
                <span class="c-nav__text">ログイン</span>

              </a>

                @if (Route::has('register'))
                <a class="c-nav__item--small" href="{{ route('register') }}">
                  <i class="fas fa-user-plus"></i>
                  <span class="c-nav__text">新規登録</span>

                </a>
                @endif

              @endauth
            </div>
          @endif
      </nav>
      <p class="u-text-align__center u-font__ss" >©︎WEBUKATU,created by Tomomi Sasaki</p>
    </footer>
  </div>

</body>

</html>
