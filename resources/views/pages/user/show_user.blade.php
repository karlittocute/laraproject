@extends ('layouts.layout')

@section('title')
ЭМБиТ | Личный кабинет пользователя
@endsection

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
			@if (empty($user->companies))
				</br>
				<h4>Статус компании: отсутствует</h4>
				</br>
				<form action="company/create">
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Заполнить информацию о компании">
				</form> 
			@else 
			<form action="vacancy/create">
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Добавить вакансию">
			</form> 
			
			@endif
		@elseif ($user->role=='operator')
			<h4>Оператор</h4>
			</br>
			<div class="row">
			<div class="col-12 col-lg-4 col-md-7">
				<div class="list-group">
					<strong>
					  <a href="{{ URL::asset('/news/create') }}" class="list-group-item list-group-item-action">Добавить новость</a>
					  @if (Auth::user()->operators->type=='GlobalAdmin')
					  <a href="{{ URL::asset('/filial/create') }}" class="list-group-item list-group-item-action">Добавить филиал</a>
					  @endif
					  @if (Auth::user()->operators->type=='LocalAdmin'|Auth::user()->operators->type=='GlobalAdmin')
					  <a href="{{ URL::asset('/operator/create') }}" class="list-group-item list-group-item-action">Добавить оператора</a>
					  @endif
					</strong>
				</div>
			</div>
		</div>
		@endif
	</div>
		</br>

@endsection

