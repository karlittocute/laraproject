@extends ('layouts.layout')

@section('title')
ЭМБиТ | {{ $vacancy -> name}}
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
    <h2>{{ $vacancy -> name}}</h2>
	<h4>Компания: <a href="/company/{{ $vacancy->company->id }}">{{$vacancy->company->name}}</a></h4>
	Область: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Field.json', {{ $vacancy->field }})); </script></br>
	<strong>Зарплата от : {{$vacancy->salaryFrom}}</strong></br>
	<small class="text-muted"> {{ $vacancy->updated_at->Format('d.m.Y')}}</small></br>
	Количество мест: {{ $vacancy -> place}} </br>
	<strong>Требования к соискателю</strong></br>
	Образование: {{ $vacancy -> education}}</br>
	Опыт работы: <script type="text/javascript"> document.write(loadValue('../../json/resume/work.json', {{ $vacancy -> workExp}})); </script></br>
	Прописка: {{ $vacancy -> visa}}</br>
	Уровень владения компьютером: <script type="text/javascript"> document.write(loadValue('../../json/resume/pcLevel.json', {{ $vacancy->pcLevel }})); </script></br>
	Сфера образования: {{ $vacancy -> eduSpec}}</br>
	{{ $vacancy -> notes}}</br>
	</br>
	
	@if (Auth::check() and ($vacancy->company->user_id==Auth::user()->id))
		<p>Статус вакансии: 
		@if ($vacancy->active==1)
			Опубликовано 
		@elseif ($vacancy->active==0)
				Ожидает проверки 
		@else
			Отклонено </br>
			Причина: {{ $vacancy->error->reason }}
		@endif
		</p>
		</br>
	
		<form action="{{$vacancy->id}}/edit">
			<input class="btn btn-lg btn-block btn-success" type="submit" value="Редактировать вакансию">
		</form> 
		</br>
		<form method="POST" action="{{$vacancy->id}}">
			{{ csrf_field()}}
			{{ method_field('DELETE') }} 
			<input class="btn btn-lg btn-block btn-success" type="submit" value="Удалить вакансию">
		</form> 
	@endif
	
	
@endsection