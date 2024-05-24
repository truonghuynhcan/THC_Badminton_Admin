<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        // Nếu đã đăng nhập, tiếp tục xử lý yêu cầu
        return $next($request);
    }
}
