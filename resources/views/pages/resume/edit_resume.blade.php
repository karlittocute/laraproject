@extends ('layouts.layout')

@section('title')
ЭМБиТ | Редактировать резюме
@endsection

@section('css')
<script>
    function loadJSONOptions(url) {
      var xhr = new XMLHttpRequest();
	  
      xhr.open('GET',url, false);
      xhr.send();

      if (xhr.status != 200) {
        // обработать ошибку
        alert('Ошибка ' + xhr.status + ': ' + xhr.statusText);
      } else {
        // вывести результат
		file = JSON.parse(xhr.responseText);
        //return file;
		for (var prop in file) {
			document.write('<option value="' + prop + '">' + file[prop]+ '</option>\n');
		}
      }
    }
  </script>
@endsection

@section('content')
	<h3>Форма редактирования резюме</h3>
	<form id="resume" name="resume" method="POST" action="/resume/{{$resume->id}}">
	    {{ csrf_field() }}<!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
		{{ method_field('PUT') }}


		<div class="boxed-group">
			<div class="section-header">
				<h3>Информация о соискателе</h3>
			</div>

			<label for="name">Фамилия имя отчество</label>
			<input id="name" name="name" class="form-control" type="text" value="{{ $resume->name }}" autofocus required>

			<label for="bDay">Дата рождения</label>
			<input id="bDay" name="bDay" class="form-control" type="text" value="{{ $resume->bDay }}" required>

			<label>Пол</label>
		 
			<label class="btn btn-default">
			  <input type="radio" name="sex" id="sex1" value="1">
			  <span class="hidden-md hidden-lg">мужской</span>
			</label>
			<label class="btn btn-default">
			  <input type="radio" name="sex" id="sex2" value="2">
			  <span class="hidden-md hidden-lg">женский</span>
			</label>

			</br>
			<label for="city">Место проживания</label>
			<input id="city" name="city" class="form-control" type="text" value="{{ $resume->city }}" required>
			
			<label for="filial_id">Филиал</label>
			<select id="filial_id" name="filial_id" class="form-control" value="">
				@foreach ($filial as $filial)
					<option selected value="{{ $filial->id }}">{{ $filial->name }}</option>
				@endforeach	
			</select>
			
			<label for="region">Район проживания</label>
			<input id="region" name="region" type="text" class="form-control" value="{{ $resume->region }}">

			<label for="visa">Прописка</label>
			<select id="visa" name="visa" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/visa.json');  
			</script>
			</select>

			<label for="citizenship">Гражданство</label>
			<input id="citizenship" name="citizenship" type="text" class="form-control" value="{{ $resume->citizenship }}" required>
			
			<label for="phone">Контактный телефон</label>
			<input id="phone" name="phone" type="tel" class="form-control" value="{{ $resume->phone }}" required>
		</div>

		
		<!--------------------------------------------------------------------------->
		
		

		<div class="boxed-group">
			<div class="section-header">
				<h3>Основное профессиональное образование</h3>
			</div>

			<label for="edu1Name">Название учебного заведения</label></sup>
			<input id="edu1Name" name="edu1Name" class="form-control" type="text" value="{{ $resume->edu1Name }}" required>

			<label for="edu1Year">Год выпуска</label></sup>
			<input id="edu1Year" name="edu1Year" type="number" class="form-control" value="{{ $resume->edu1Year }}" required>

			<label for="edu1Spec">Специальность</label>
			<input id="edu1Spec" name="edu1Spec" class="form-control" value="{{ $resume->edu1Spec }}" required>
		
			<label for="edu1Field">Область образования</label>
			<select id="edu1Field" name="edu1Field" class="form-control" required>
				<option label="&nbsp;"></option>
				<script type="text/javascript"> 
					loadJSONOptions('../../json/resume/edu1Field.json');  
				</script>
			</select>
		
			<label for="edu1FieldText">Уточнение области</label>
			<input id="edu1FieldText" name="edu1FieldText" type="text" class="form-control" value="{{ $resume->edu1FieldText }}">					
									
			<label for="edu1Degree">Уровень образования</label><sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup>
			<select id="edu1Degree" name="edu1Degree" class="form-control" required>
				<option label="&nbsp;"></option>
				<script type="text/javascript"> 
					loadJSONOptions('../../json/resume/edu1Degree.json');  
				</script>
			</select>

			<label for="edu1Form">Форма обучения</label><sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup>
			<select id="edu1Form" name="edu1Form" class="form-control" required>
				<option label="&nbsp;"></option>
				<script type="text/javascript"> 
					loadJSONOptions('../../json/resume/edu1Form.json');  
				</script>
			</select>


		</div> <!-- .boxed-group -->

		
		<!--------------------------------------------------------------------------->
		

    <div class="boxed-group">
		<div class="section-header">
			<h3>Дополнительное профессиональное образование</h3>
		</div>

		<label for="edu2Name">Название учебного заведения</label>
		<input  id="edu2Name" name="edu2Name" class="form-control" value="{{ $resume->edu2Name }}">

		<label for="edu2Year">Год выпуска</label>
		<input id="edu2Year" name="edu2Year" type="number" class="form-control" value="{{ $resume->edu2Year }}">

		<label for="edu2Spec">Специальность</label>
		<input id="edu2Spec" name="edu2Spec" class="form-control" value="{{ $resume->edu2Spec }}">

		<label for="edu2Field">Область образования</label>
		<select id="edu2Field" name="edu2Field" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/edu1Field.json');  
			</script>
		</select>
		
		<label for="edu2FieldText">Уточнение области</label>
		<input id="edu2FieldText" name="edu2FieldText" type="text" class="form-control" value="{{ $resume->edu2FieldText }}">

    </div> <!-- .boxed-group -->

		
		<!--------------------------------------------------------------------------->

		

	<div class="boxed-group"> 
		<div class="section-header">
			<h3>Дополнительные навыки</h3>
		</div>

		<label for="lang">Язык</label>
		<select id="lang" name="lang" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/lang.json');  
			</script>
		</select>

		<label for="langLevel">Уровень языка</label>
		<select id="langLevel" name="langLevel" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/langLevel.json');  
			</script>
		</select>

		<label for="pcLevel">Навык владения ПК</label>
		<select name="pcLevel" id="pcLevel" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/pcLevel.json');  
			</script>
		</select>

		<label for="driverLicense">Водительские права</label>
		<select id="driverLicense" name="driverLicense" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/driverLicense.json');  
			</script>
		</select> 

		<label for="skill">Умения, навыки</label>
		<textarea id="skill" name="skill" class="form-control" rows="3">{{$resume->skill}}"</textarea>

	</div> <!-- .group --> 

		
		<!--------------------------------------------------------------------------->

		
		
		
    <div class="boxed-group">
		<div class="section-header">
			<h3>Желаемая вакансия</h3>
		</div>


		<label for="vacancy">Должность</label> 
		<input id="vacancy" name="vacancy" class="form-control" value="{{ $resume->vacancy }}" required>


		<!-- если зарплата договорная, можно поставить 0 -->
		<label for="salary">Зарплата в месяц</label>
		<div class="input-group">
			<span class="input-group-addon">от</span>
			<input id="salary" name="salary" min="0" max="1000000" type="number" step="100" class="form-control" value="{{ $resume->salary }}" >
			<span class="input-group-addon">&#8381;</span>
		</div>


		<label for="vacancyField">Поместить в раздел<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
		<select id="vacancyField" name="vacancyField" class="form-control" required>
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/edu1Field.json');  
			</script>
		</select>

		<label for="work">Опыт</label>
		<select id="work" name="work" class="form-control" required>
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/work.json');  
			</script>
		</select>
					  

		<label for="busy">Занятость</label>
		<select id="busy" name="busy" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/busy.json');  
			</script>
		</select>



		<label for="schedule">График работы</label> 
		<select id="schedule" name="schedule" class="form-control" required>
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/schedule.json');  
			</script>
		</select>


		<label for="schedulespecial">Уточнение графика работы</label>
		<div class="input-group">
			<span class="input-group-addon">
			<input id="schedulespecial" name="schedulespecial" type="checkbox" aria-label="">
			</span>
			<input id="scheduleText" name="scheduleText" type="text" class="form-control" aria-label="" placeholder="опишите лаконично особенности графика работы">
		</div><!-- /input-group -->

		<label for="workExp">Опыт работы</label>
		<textarea id="workExp" name="workExp" class="form-control" rows="3">{{ $resume->workExp}}</textarea> 

	</div>  <!--.boxed-group -->

		
		<!--------------------------------------------------------------------------->
		
		<button type="submit" type="button" class="btn btn-lg btn-block btn-success"><span>Редактировать резюме</span></button>
			  @include('layouts.errors')
		 </div>
    </form>
@endsection