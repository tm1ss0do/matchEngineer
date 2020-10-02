<!-- ****************************** -->
<!-- sidemenu mypage -->

<div class="p-my-menu__container">
  <ul class="c-my-menu__container">
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/{{ $user_id }}/profile">
        <i class="far fa-user"></i>ようこそ、{{ $name }}さん
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/new">
        <i class="far fa-handshake"></i>案件登録
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/registered">
        <i class="fas fa-pen"></i>登録済み案件
      </a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/applied">
        <i class="far fa-paper-plane"></i>応募済み案件
      </a>
    </li>
    @if( $pm_yet_notify_flg )
      <li class="c-my-menu__item c-notify">
    @else
      <li class="c-my-menu__item">
    @endif
        <a class="c-my-menu__link" href="{{ url('/') }}/mypages/public_msg">
          <i class="far fa-comments"></i>パブリックメッセージ
        </a>
      </li>
    @if( $dm_yet_notify_flg )
      <li class="c-my-menu__item c-notify">
    @else
      <li class="c-my-menu__item">
    @endif
        <a class="c-my-menu__link" href="{{ url('/') }}/mypages/direct_msg">
          <i class="far fa-envelope"></i>ダイレクトメッセージ
        </a>
      </li>


  </ul>
</div>
