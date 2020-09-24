@extends('layouts.base')

@section('title', 'プロフィール')

@section('content')
<!-- ユーザーのプロフィール表示画面 -->

メール変更画面

<div class="">
    <div class="">
        <div class="">
            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
            <div class="">
                {{ session('flash_message') }}
            </div>
            @endif
            <div class="">
                <div class="">メールアドレス変更</div>

                <div class="">
                    新規メールアドレスを入力してください
                    <form action="" method="POST">
                        @csrf
                        <label for="new_email">email</label>
                        <input type="email" name="new_email">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
