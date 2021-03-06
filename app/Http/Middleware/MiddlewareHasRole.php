<?php
// Разрешает/Отклоняет достук к странице если роль пользователя соответствует/не соответствует заданной 
namespace App\Http\Middleware;

use Closure;

class MiddlewareHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

	public function handle($request, Closure $next, $role)
    {
		$user = $request->user();
        if ($user && $user->hasRole($role)) {
            return $next($request);
        }

        return redirect('/');
    }
}
