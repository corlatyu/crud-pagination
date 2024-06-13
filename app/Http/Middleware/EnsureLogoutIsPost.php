<?php

namespace App\Http\Middleware;

use Closure;

class EnsureLogoutIsPost
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
        // Periksa apakah permintaan menggunakan metode POST
        if (!$request->isMethod('post')) {
            abort(404);
            // atau, jika Anda ingin memberikan pesan error kustom:
            // return redirect()->back()->withErrors(['message' => 'Page not found']);
        }

        return $next($request);
    }
}
