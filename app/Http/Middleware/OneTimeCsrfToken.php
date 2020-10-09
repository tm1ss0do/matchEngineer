<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Cache;

class OneTimeCsrfToken
{
  // ワンタイムトークンの作成（laravelのcsrfチェック後、トークンを再生成する処理）
  // 二重送信を防ぐ
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->method() === 'POST'){
          // POSTのときだけトークンリフレッシュ
          $request->session()->regenerateToken();
        }

        return $next($request);
    }
}
