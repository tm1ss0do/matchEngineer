@extends('layouts.base')

@section('title', '案件詳細')

@section('content')

<h3 class="c-title__page">案件詳細</h3>

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

      <a class="c-btn__moderate" href="{{ url('projects/'.$project->id.'/edit' ) }}">
        編集する
      </a>

      @elseif( $already_apply )
      <a class="c-btn__medi" href="{{ url('mypages/direct_msg/'.$already_apply->id ) }}">
        この案件は応募済みです
      </a>
      @else
      <a class="c-btn__emphasis" href="{{ url('projects/'.$project->id.'/application' ) }}">応募する</a>
      @endif
    @else
    <a class="c-btn__emphasis" href="{{ route('login') }}">
      <i class="fas fa-sign-in-alt"></i>
      ログインして応募しましょう！
    </a>
    @endif
  </div>

</section>




<!-- ここから、メッセージ一覧 -->

<section class="p-comments">

  <h3 class="c-title__section">メッセージ</h3>
  <p class="u-font__sub">この依頼に関する質問などを送りましょう！</br>
    例）ご希望の完成像について、具体的なイメージに近いサイトがあれば教えてください。</p>


  <message-component
  :publicmsgs = "{{ $publicmsgs }}"
  :project = "{{ $project }}"
  ></message-component>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form class="" action="" method="post">
    @csrf
    <label class="c-title__small" for="pub_msg">メッセージ送信フォーム
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
      <input class="c-btn__submit" type="submit" name="" value="送信">
    </div>
  </form>

</section>

@endsection
