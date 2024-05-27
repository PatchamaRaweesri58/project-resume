<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('lastActivity')) {
            $lastActivity = $request->session()->get('lastActivity');
            $currentTime = now();
    
            // ตรวจสอบระยะเวลาที่ผ่านมา
            $diffInMinutes = $lastActivity->diffInMinutes($currentTime);
    
            if ($diffInMinutes > 30) {
                // ออกจากระบบหาก Session หมดอายุ
                Auth::logout();
                $request->session()->flush();
                return redirect('/login')->with('error', 'Session timeout. Please login again.');
            }
        }
    
        // อัปเดตเวลาล่าสุดที่ใช้งาน Session
        $request->session()->put('lastActivity', now());
    
        return $next($request);
    }
}
