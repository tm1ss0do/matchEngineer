<!-- ****************************** -->
<!-- sidemenu mypage -->

<div class="p-my-menu__container">
  <ul class="c-my-menu__container">
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/{{ $user_id }}/profile">
        <i class="far fa-user"></i>
        <span class="c-my-menu__text">ようこそ、{{ $name }}さん</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/new">
        <i class="far fa-handshake"></i>
        <span class="c-my-menu__text">案件登録</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/registered">
        <i class="fas fa-pen"></i>
        <span class="c-my-menu__text">登録済み案件</span>
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/applied">
        <i class="far fa-paper-plane"></i>
        <span class="c-my-menu__text">応募済み案件</span>
      </a>
    </li>
    {{ $pm_yet_notify_flg }}
        <a class="c-my-menu__link" href="{{ url('/') }}/mypages/public_msg">
          <i class="far fa-comments"></i>
          <span class="c-my-menu__text">パブリックメッセージ</span>
        </a>
      </li>
    {{ $dm_yet_notify_flg }}
        <a class="c-my-menu__link" href="{{ url('/') }}/mypages/direct_msg">
          <i class="far fa-envelope"></i>
          <span class="c-my-menu__text">ダイレクトメッセージ</span>
        </a>
      </li>


  </ul>
</div>
