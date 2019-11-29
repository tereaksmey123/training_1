<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('set_lang')) session(['set_lang' => 'en']);
        // if (Cookie::get('set_lang', '', 3360)) session(['set_lang' => Cookie::get('set_lang')]);
        app()->setLocale(session('set_lang'));
        return $next($request);
    }
}
