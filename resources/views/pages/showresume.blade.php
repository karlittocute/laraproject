@extends ('layouts.layout')

@section('content')
	<div class="container">
			<h2>Имя: {{ $resume->name }}</h2>
			<p> {{ $resume->updated_at}} </p>
			<li>Телефон: {{ $resume->phone }}</li>
			<li>Email: {{ $resume->email }}</li>
		</div>
		</br>
		@if (Auth::check() and ($resume->user_id==Auth::user()->id))
			Статус резюме: 
			@if ($resume->active==1)
				Опубликовано 
			@elseif ($resume->active==0)
					Ожидает проверки 
			@else
				Отклонено </br>
				Причина: {{ $resume->error->reason }}
			@endif
			</br>
		
		<form action="{{$resume->id}}/edit">
			<input class="btn btn-lg btn-block btn-success" type="submit" value="Редактировать резюме">
		</form> 
		</br>
		<form method="POST" action="{{$resume->id}}">
			{{ csrf_field()}}
			{{ method_field('DELETE') }} 
			<input class="btn btn-lg btn-block btn-success" type="submit" value="Удалить резюме">
		</form> 
		@endif
		
		@if (Auth::check() and (Auth::user()->role=='operator'))
			@if ($resume->public==0)
				Резюме уже опубликовано. Если Вы нашли ошибку, то опишите ее и отклоните запись
				<form method="POST" action="{{$resume->id}}/deny">
					{{ csrf_field()}}
					<textarea required class="form-control" id="comment" rows="3"  name="reason" id="reason" placeholder="Причина отклонения записи" ></textarea>
					</br>
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Отклонить запись">
				</form> 
			@elseif ($resume->active==2)
				Запись отклонена </br>
				Причина: {{ $resume->error->reason }}</br>
				Вы можете перезаписать сообщение об ошибке </br>
				<form method="POST" action="{{$resume->id}}/deny">
					{{ csrf_field()}}
					<textarea required class="form-control" id="comment" rows="3" name="reason" id="reason" placeholder="Причина отклонения записи" ></textarea>
					</br>
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Отклонить запись">
				</form> 
			@else 
				<form method="POST"  action="{{$resume->id}}/publish">
					{{ csrf_field()}}
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Опубликовать резюме">
				</form> 
				</br>
				<form method="POST" action="{{$resume->id}}/deny">
					{{ csrf_field()}}
					<textarea required class="form-control" id="comment" rows="3"  name="reason" id="reason" placeholder="Причина отклонения записи" ></textarea>
					</br>
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Отклонить запись">
				</form> 
			@endif
		@endif
@endsection

