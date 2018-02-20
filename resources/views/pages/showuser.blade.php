@extends ('layouts.layout')

@section('content')
	<div class="container">
		<h1>Email: {{ $user->email }}</h1>
		@if ($user->role=='applicant')
			<h3>Соискатель</h3>
			@if (empty($user->resumes))
				</br>
				<h4>Статус резюме: отсутствует</h4>
				</br>
				<form action="resume/create">
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Заполнить анкету соискателя">
				</form> 
			@else
				<a href="/resume/{{ $user->resumes->id }}">
					<div>
						<h3>Резюме</h3>
						<h4>{{$user->resumes->name}}</h4>
						Статус: 
						@if ($user->resumes->active==1)
							Опубликовано 
						@elseif ($user->resumes->active==0)
							Ожидает проверки 
						@else
							Отклонено </br>
							Причина: {{ $user->resumes->error->reason }}
						@endif
					</div>
				</a>
			@endif
		@elseif ($user->role=='company')
			<h4>Компания</h4>
		@elseif ($user->role=='operator')
			<h4>Оператор</h4>
		@endif
	</div>
		</br>

@endsection

