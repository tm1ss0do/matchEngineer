<!-- ****************************** -->
<!-- sidemenu mypage -->

<div class="p-my-menu__container">
  <ul class="c-my-menu__container">
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/{{ $user_id }}/profile">
        <i class="far fa-user"></i>
        <span class="c-my-menu__text">ようこそ、{{ $name }}さん</span>
        <span class="c-my-menu__mb-text">個人設定</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/new">
        <i class="far fa-handshake"></i>
        <span class="c-my-menu__text">案件登録</span>
        <span class="c-my-menu__mb-text">案件登録</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypage">
        <i class="fas fa-pen"></i>
        <span class="c-my-menu__text">登録済み案件</span>
        <span class="c-my-menu__mb-text">登録済</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypage/applied">
        <i class="far fa-paper-plane"></i>
        <span class="c-my-menu__text">応募済み案件</span>
        <span class="c-my-menu__mb-text">応募済</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      {{ $pm_yet_notify_flg }}
          <i class="far fa-comments"></i>
          <span class="c-my-menu__text">パブリックメッセージ</span>
          <span class="c-my-menu__mb-text">PM</span>
        </a>
      </li>
    <li class="c-my-menu__item">
      {{ $dm_yet_notify_flg }}
          <i class="far fa-envelope"></i>
          <span class="c-my-menu__text">ダイレクトメッセージ</span>
          <span class="c-my-menu__mb-text">DM</span>
        </a>
      </li>


  </ul>

</div>
