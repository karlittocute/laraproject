<?php
// Разрешает/Отклоняет доступ к странице если есть/нет записи в БД Company от данного пользователя
// Предотвращает добавление вакансии, если пользователь не зарегестрировал компанию 
namespace App\Http\Middleware;
use DB;
use Closure;

class MiddlewareForVacancy
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
		$user = $request->user();
		$user_id = $user->id;
		$record_id = DB::table('companies')->where('user_id', $user_id)->value('id');
        if (empty($record_id)) {
			return redirect('/');
        }
		return $next($request);
    }
}
