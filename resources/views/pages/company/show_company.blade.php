@extends ('layouts.layout')

@section('title')
ЭМБиТ | {{ $company -> name}}
@endsection

@section('css')
<script>
    function loadValue(url, att) {
      var xhr = new XMLHttpRequest();
	  
      xhr.open('GET',url, false);
      xhr.send();

      if (xhr.status != 200) {
        // обработать ошибку
        alert('Ошибка ' + xhr.status + ': ' + xhr.statusText);
      } else {
        // вывести результат
		file = JSON.parse(xhr.responseText);
        return file[att];
      }
    }
  </script>
@endsection

@section('content')

    <h2>"{{ $company -> name}}"</h2>
	<p>
		Область: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Field.json', {{ $company->field }})); </script></br>
		Чем занимается компания: {{ $company -> profile}}</br>
		Адрес: {{ $company -> address}}</br>
		Контакты: {{ $company -> persons}}</br>
		Телефон: {{ $company -> phone}}</br>
		Email: {{ $company -> email}}</br>
		{{ $company -> additionalInfo}}</br>
		
	</p>
	<div class="vacancies">
		@foreach ($company->vacancy as $vacancy)
			<article>
				<h3><a href="/vacancy/{{ $vacancy->id }}">{{ $vacancy->name}}</a></h3>
				Зарплата от: {{ $vacancy->salaryFrom}}
			</article>
		</br>
		@endforeach
		
	</div>
	
	
	
	@if (Auth::check() and ($company->user_id==Auth::user()->id))
		<p>Статус информации: 
		@if ($company->active==1)
			Опубликовано 
		@elseif ($company->active==0)
			Ожидает проверки 
		@else
			Отклонено </br>
			Причина: {{ $company->error->reason }}
		@endif
		</p>
		</br>
		<form action="{{ URL::asset('/vacancy/create') }}">
				<input class="btn btn-lg btn-block btn-success" type="submit" value="Добавить вакансию">
		</form> 
		</br>
		<form action="{{$company->id}}/edit">
			<input class="btn btn-lg btn-block btn-success" type="submit" value="Редактировать информацию о компании">
		</form> 
		</br>
		<form method="POST" action="{{$company->id}}">
			{{ csrf_field()}}
			{{ method_field('DELETE') }} 
			<input class="btn btn-lg btn-block btn-success" type="submit" value="Удалить информацию о компании">
		</form> 
	@endif
	

@endsection