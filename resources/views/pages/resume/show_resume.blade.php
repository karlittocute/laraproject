@extends ('layouts.layout')

@section('title')
{{ $resume->vacancy }}
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
	<div class="container">
		<h2>{{ $resume->vacancy }}</h2>
		<h3>{{ $resume->name }}</h3>
		<p>
		@if ($resume->sex==2)
			Женщина</br>
		@else 
			Мужчина</br>
		@endif
		Дата рождения: {{ date_format(date_create($resume->bDay), 'd.m.Y') }}</br>
		Город: {{ $resume->cityId }}</br>
		Район проживания: {{ $resume->region }}</br>
		Гражданство: {{ $resume->citizenship }}</br>
		Прописка: <script type="text/javascript"> document.write(loadValue('../../json/resume/visa.json', {{ $resume->visa }})); </script> </br>
		Телефон: Информация предоставляется по телефону биржи</br>
		Email: Информация предоставляется по телефону биржи</br>
		<!--
		Телефон: {{ $resume->phone }}</br>
		Email: {{ $resume->email }}</br>
		-->
		Дата размещения: {{ $resume->updated_at->Format('d.m.Y')}} </br>
		</p>
		
		
		<h4>Основное профессиональное образование</h4>
		<p>
		Учебное заведение: {{ $resume->edu1Name }}</br>
		Специальность: {{ $resume->edu1Spec }}</br>
		Область: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Field.json', {{ $resume->edu1Field }})); </script></br>
		Уточнение области: {{ $resume->edu1FieldText }}</br>
		Уровень образования: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Degree.json', {{ $resume->edu1Degree }})); </script></br>
		Год окончания: {{ $resume->edu1Year }}</br>
		Форма обучения: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Form.json', {{ $resume->edu1Form }})); </script></br>
		</p>
		
		@if ($resume->edu2Name)
			<h4>Дополнительное профессиональное образование</h4>
			Учебное заведение: {{ $resume->edu2Name }}</br>
			Специальность: {{ $resume->edu2Spec }}</br>
			Область: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Field.json', {{ $resume->edu2Field }})); </script></br>
			Уточнение области: {{ $resume->edu2FieldText }}</br>
			Год окончания: {{ $resume->edu2Year }}</br>
		@endif
		
		<h4>Дополнительные навыки</h4>
		<p>
		Язык: <script type="text/javascript"> document.write(loadValue('../../json/resume/lang.json', {{ $resume->lang }})); </script></br>
		Уровень владения: <script type="text/javascript"> document.write(loadValue('../../json/resume/langLevel.json', {{ $resume->langLevel }})); </script></br>
		Уровень владения компьютером: <script type="text/javascript"> document.write(loadValue('../../json/resume/pcLevel.json', {{ $resume->pcLevel }})); </script></br>
		Водительское удостоверениe: <script type="text/javascript"> document.write(loadValue('../../json/resume/driverLicense.json', {{ $resume->driverLicense }})); </script></br>
		Навыки, знания: {{ $resume->skill }}</br>
		</p>
		
		<h4>Опыт работы</h4> 
		<p>{{ $resume->workExp }}</p>
		
		<h4>Желаемая вакансия</h4>
		<p>
		Название вакасии, должность: {{ $resume->vacancy }}</br>
		Зарплата в месяц от {{ $resume->salary }}</br>
		Область в которой будет вакансия: <script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Field.json', {{ $resume->vacancyField }})); </script></br>
		Поместить в раздел (см. Область): {{ $resume->fieldMain }}</br>
		Опыт работы: <script type="text/javascript"> document.write(loadValue('../../json/resume/work.json', {{ $resume->work }})); </script></br>
		Занятость: <script type="text/javascript"> document.write(loadValue('../../json/resume/busy.json', {{ $resume->busy }})); </script></br>
		График работы: <script type="text/javascript"> document.write(loadValue('../../json/resume/schedule.json', {{ $resume->schedule }})); </script></br>
		График работы (текст): {{ $resume->scheduleText }}</br>
		</p>
		
	</div>
	</br>
	@if (Auth::check() and ($resume->user_id==Auth::user()->id))
		<p>Статус резюме: 
		@if ($resume->active==1)
			Опубликовано 
		@elseif ($resume->active==0)
				Ожидает проверки 
		@else
			Отклонено </br>
			Причина: {{ $resume->error->reason }}
		@endif
		</p>
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

