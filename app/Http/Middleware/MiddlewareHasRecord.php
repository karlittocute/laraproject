<?php
// Разрешает/Отклоняет доступ к странице если нет/есть запись в БД(Resumes/Company) от данного пользователя
namespace App\Http\Middleware;
use DB;
use Closure;

class MiddlewareHasRecord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

	public function handle($request, Closure $next, $db_name)
    {
		$user = $request->user();
		$user_id = $user->id;
		$record_id = DB::table($db_name)->where('user_id', $user_id)->value('id');
        if (empty($record_id)) {
			return $next($request);
        }
		return redirect('/');
    }
}
