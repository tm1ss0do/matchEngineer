<!-- ****************************** -->
<!-- sidemenu mypage -->

<p>{{ $name }}さんのマイページ</p>

<ul>
  <li>
    <a href="{{ url('/') }}/projects/new">案件登録</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/registered">登録済み案件一覧</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/applied">応募済み案件一覧</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/public_msg">パブリックメッセージ一覧</a>
    {{ $pm_yet_notify_flg }}
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/direct_msg">ダイレクトメッセージ一覧</a>
    {{ $dm_yet_notify_flg }}
  </li>
  <li>
    <a href="{{ url('/') }}/projects/{{ $user_id }}/profile">プロフィール</a>
  </li>
  <li>
    <a href="{{ url('/') }}/mypages/withdraw">退会</a>
  </li>
</ul>
