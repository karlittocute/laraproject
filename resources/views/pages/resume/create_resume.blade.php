@extends ('layouts.layout')

@section('title')
ЭМБиТ | Добавление резюме
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
			

	<form id="resume" name="resume" method="POST" action="/resume">
	    {{ csrf_field()}} <!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
		<h1>Анкета соискателя</h1>
		</br>


		<div class="boxed-group">
			<div class="section-header">
				<h3>Информация о соискателе</h3>
			</div>

			<label for="name">Фамилия имя отчество</label>
			<input id="name" name="name" class="form-control" type="text" placeholder="Константинопольский Константин Константинович" autofocus required>

			<label for="bDay">Дата рождения</label>
			<input id="bDay" name="bDay" class="form-control" type="text" placeholder="01.11.1901" required>

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
			<input id="city" name="city" class="form-control" type="text" placeholder="Санкт-Петербург" required>
			
			<label for="filial_id">Филиал</label>
			<select id="filial_id" name="filial_id" class="form-control">
				@foreach ($filial as $filial)
					<option selected value="{{ $filial->id }}">{{ $filial->name }}</option>
				@endforeach	
			</select>
			
			<label for="region">Район проживания</label>
			<input id="region" name="region" type="text" class="form-control" placeholder="Приморский район, проспект Королёва">

			<label for="visa">Прописка</label>
			<select id="visa" name="visa" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/visa.json');  
			</script>
			</select>

			<label for="citizenship">Гражданство</label>
			<input id="citizenship" name="citizenship" type="text" class="form-control" placeholder="Российская Федерация" required>
			
			<label for="phone">Контактный телефон</label>
			<input id="phone" name="phone" type="tel" class="form-control" placeholder="+7 (812) 212 85 06" required>
		</div>

		
		<!--------------------------------------------------------------------------->
		
		

		<div class="boxed-group">
			<div class="section-header">
				<h3>Основное профессиональное образование</h3>
			</div>

			<label for="edu1Name">Название учебного заведения</label></sup>
			<input id="edu1Name" name="edu1Name" class="form-control" type="text" placeholder="Санкт–Петербургский государственный университет технологии и дизайна" required>

			<label for="edu1Year">Год выпуска</label></sup>
			<input id="edu1Year" name="edu1Year" type="number" class="form-control" placeholder="2010" required>

			<label for="edu1Spec">Специальность</label>
			<input id="edu1Spec" name="edu1Spec" class="form-control" placeholder="Товароведение и экспертиза в сфере производства и обращения непродовольственных товаров и сырья" required>
		
			<label for="edu1Field">Область образования</label>
			<select id="edu1Field" name="edu1Field" class="form-control" required>
				<option label="&nbsp;"></option>
				<script type="text/javascript"> 
					loadJSONOptions('../../json/resume/edu1Field.json');  
				</script>
			</select>
		
			<label for="edu1FieldText">Уточнение области</label>
			<input id="edu1FieldText" name="edu1FieldText" type="text" class="form-control" placeholder="Уточните область образования, если возможно">					
									
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
		<input  id="edu2Name" name="edu2Name" class="form-control" placeholder="Санкт–Петербургский государственный университет технологии и дизайна">

		<label for="edu2Year">Год выпуска</label>
		<input id="edu2Year" name="edu2Year" type="number" class="form-control" placeholder="2015">

		<label for="edu2Spec">Специальность</label>
		<input id="edu2Spec" name="edu2Spec" class="form-control" placeholder="Энерго- и ресурсосберегающие процессы в химической технологии, нефтехимии и биотехнологии">

		<label for="edu2Field">Область образования</label>
		<select id="edu2Field" name="edu2Field" class="form-control">
			<option label="&nbsp;"></option>
			<script type="text/javascript"> 
				loadJSONOptions('../../json/resume/edu1Field.json');  
			</script>
		</select>
		
		<label for="edu2FieldText">Уточнение области</label>
		<input id="edu2FieldText" name="edu2FieldText" type="text" class="form-control" placeholder="Уточните область образования, если возможно">

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
		<textarea id="skill" name="skill" class="form-control" rows="3"></textarea>

	</div> <!-- .group --> 

		
		<!--------------------------------------------------------------------------->

		
		
		
    <div class="boxed-group">
		<div class="section-header">
			<h3>Желаемая вакансия</h3>
		</div>


		<label for="vacancy">Должность</label> 
		<input id="vacancy" name="vacancy" class="form-control" placeholder="Менеджер по продажам" required>


		<!-- если зарплата договорная, можно поставить 0 -->
		<label for="salary">Зарплата в месяц</label>
		<div class="input-group">
			<span class="input-group-addon">от</span>
			<input id="salary" name="salary" min="0" max="1000000" type="number" step="100" class="form-control" >
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
		<textarea id="workExp" name="workExp" class="form-control" rows="3" placeholder="Для описания лучше всего использовать хронологический порядок и начинать с последнего места работы. Пример: [11.2014] - ООО &laquo;Интерстеллар&raquo;, менеджер по персоналу, подбор специалистов для участия в межгалактическом перелёте."></textarea> <!-- в хронологическом порядке (как правило, обратном, начиная с последнего места работы) -->

	</div>  <!--.boxed-group -->

		
		<!--------------------------------------------------------------------------->
	
    <div class="boxed-group">
         
        <div class="g-recaptcha" data-sitekey="6Lf_lhgTAAAAABBifjpmW6I-HetI0MJKx2iBDc6r"></div>
      
		<p class="text-center"><small>
			Нажимая кнопку &laquo;Добавить резюме&raquo;, Вы&nbsp;соглашаетесь с&nbsp;<a href="#">правилами использования сервиса</a> и&nbsp;подтверждаете, что резюме заполнено <mark>правильно</mark>, а&nbsp;информация в&nbsp;нём&nbsp;&mdash; <mark>достоверна</mark>.
		</small></p>

		<button type="submit" id="submitResume" name="submitResume" type="button" class="btn btn-lg btn-block btn-success"><i class="fa fa-paper-plane-o"></i> <span>Добавить резюме</span></button>

    </div>
	
    </form>


@endsection