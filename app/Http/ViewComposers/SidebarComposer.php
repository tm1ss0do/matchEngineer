<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use App\PublicNotify;
use App\DirectNotify;


class SidebarComposer {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function compose(View $view)
    {

        // ---------------------------
        // サイドバー用変数まとめ（ビューコンポーザー）
        $user = $this->auth->user();
        // 未読フラグ回収（パブリックメッセージ）
        $pm_yet_notify_flg = $user->public_notify
                           ->where('read_flg','0')
                           ->first();

        // 未読フラグ回収（ダイレクトメッセージ）
        $dm_yet_notify_flg = $user->direct_notify
                           ->where('read_flg','0')
                           ->first();
        // ---------------------------

        // userという変数を使えるようにし、その中に$this->auth->user()という値を詰めてビューに渡す。という定義の仕方になります
        // $view->with('compose_user', $this->auth->user());

        $view->with([
          'user' => $user,
          'pm_yet_notify_flg' => $pm_yet_notify_flg,
          'dm_yet_notify_flg' => $dm_yet_notify_flg,

        ]);

    }


}
