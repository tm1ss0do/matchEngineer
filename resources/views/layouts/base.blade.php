<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>match | @yield('title', 'Home')</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @if(app('env') == 'production')
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif

    <!-- Scripts -->
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ secure_asset('img/match_blue_logo.jpg') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">


    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">



</head>
<body>
  <div id="app">
       <!-- フラッシュメッセージ -->
       @if (session('flash_message'))
         <div class="c-session-msg">
           {{ session('flash_message') }}
         </div>
       @endif
       @if (session('status'))
           <div class="c-session-msg">
               {{ session('status') }}
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
    </header>


    <main id="main" class="l-main">
        @yield('hero')
      <div class="l-main__wrap">
        @yield('content')
      </div>

      <div class="c-btn__panel--left">
        @section('back')
          <a class="c-btn__moderate" href="{{ url()->previous() }}">＜＜戻る</a>
        @show
      </div>

      <div class="c-page-top js-scroll-top" v-scroll-to="'#header'" >
        <a href="#"></a>
      </div>

    </main>

    <footer id="footer" class="l-footer">
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
