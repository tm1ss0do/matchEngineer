<!-- ****************************** -->
<!-- sidemenu mypage -->

<div class="p-my-menu__container">
  <ul class="c-my-menu__container">
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/{{ $user_id }}/profile">ようこそ、{{ $name }}さん</a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/projects/new">案件登録</a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/registered">登録済み案件一覧</a>
    </li>
    <li class="c-my-menu__item">
      <a class="c-my-menu__link" href="{{ url('/') }}/mypages/applied">応募済み案件一覧</a>
    </li>
    @if( $pm_yet_notify_flg )
      <li class="c-my-menu__item c-notify">
    @else
      <li class="c-my-menu__item">
    @endif
        <a class="c-my-menu__link" href="{{ url('/') }}/mypages/public_msg">パブリックメッセージ一覧</a>
      </li>
    @if( $dm_yet_notify_flg )
      <li class="c-my-menu__item c-notify">
    @else
      <li class="c-my-menu__item">
    @endif
        <a class="c-my-menu__link" href="{{ url('/') }}/mypages/direct_msg">ダイレクトメッセージ一覧</a>
      </li>


  </ul>
</div>
