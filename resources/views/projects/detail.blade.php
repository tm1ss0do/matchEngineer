@extends('layouts.base')

@section('title', '案件詳細')

@section('scripts')
<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/pagetop.js') }}" defer></script>
<script src="{{ secure_asset('js/direct.js') }}" defer></script>
<script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>
@endsection


@section('content')

<h3 class="c-title--page">案件詳細</h3>

  <project-item
  :project="{{ $project }}"
  :user="{{ $project->user }}"
  url="{{ url('/') }}"
  :non-display="true"
  :all="true"
  ></project-item>


<section class="p-btn-panels__wrap">
  <!-- twitter share -->
  <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button"
     data-size="large"
     data-dnt="true"
     data-text="match｜案件名：{{ mb_substr($project->project_title, 0, 80) }}...">
     tweet
   </a>
  <div class="c-btn__panel">
    @if( $auther )
      @if( $project->user_id === $auther->id )
      <a class="c-btn--moderate" href="{{ url('projects/'.$project->id.'/edit' ) }}">
        編集する
      </a>

      @elseif( $already_apply )
      <a class="c-btn--medi" href="{{ url('mypage/direct_msg/'.$already_apply->id ) }}">
        この案件は応募済みです
      </a>
      @else
      <a class="c-btn--emphasis" href="{{ url('projects/'.$project->id.'/application' ) }}">応募する</a>
      @endif
    @else
    <a class="c-btn--emphasis" href="{{ route('login') }}">
      <i class="fas fa-sign-in-alt"></i>
      ログインして応募しましょう！
    </a>
    @endif
  </div>

</section>




<!-- ここから、メッセージ一覧 -->

<section class="p-comments">

  <h3 class="c-title--section">メッセージ</h3>
  <p class="u-font--sub">この依頼に関する質問などを送りましょう！</br>
    例）ご希望の完成像について、具体的なイメージに近いサイトがあれば教えてください。
  </p>


  <message-component
  :publicmsgs = "{{ $publicmsgs }}"
  :project = "{{ $project }}"
  ></message-component>

  @if ($errors->any())
    <ul class="u-font--error" role="alert">
      @foreach ($errors->all() as $error)
        <li class="u-list--none">{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form class="js-form" action="" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <label class="c-title--small" for="pub_msg">メッセージ送信フォーム
       <counter-component
        :countnum = "1000"
        ex = "募集者へ質問してみましょう。"
        id = "pub_msg"
        name = "content"
        :old="{{json_encode(Session::getOldInput())}}"
        :db = "''"
        ></counter-component>
      </label>
    <div class="c-btn__panel">
      <input class="c-btn__submit js-submit" type="submit" name="" value="送信">
    </div>
  </form>

</section>

@endsection
