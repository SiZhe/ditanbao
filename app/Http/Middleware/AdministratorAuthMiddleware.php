<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdministratorAuthMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		if (Auth::guard('backend')->guest()) {
			return redirect('backend/login');
		}
		return $next($request);
	}
}
