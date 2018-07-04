@extends ('layouts.layout')

@section('title')
ЭМБиТ | Добавление вакансии
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
    <form method="POST" action="/vacancy">
        {{ csrf_field() }}
		<h1>Добавление вакансии</h1>
		
			<h3>Информация о вакансии</h3>

			<label for="name">Название вакансии<sup><i class="fa fa-asterisk"
													   style="color: #c0392b;"></i></sup></label>
			<input id="name" name="name" class="form-control" type="text"
				   placeholder="Инженер-проектировщик" autofocus required>
			
			<label for="salaryFrom">Зарплата от<sup><i class="fa fa-asterisk"
													   style="color: #c0392b;"></i></sup></label>
			<input id="salaryFrom" name="salaryFrom" class="form-control" type="text" autofocus required>
			
			<label for="place">Количество мест<sup><i class="fa fa-asterisk"
													  style="color: #c0392b;"></i></sup></label>
			<input id="place" name="place" type="number" min="1" max="999" type="number"
				   step="1" class="form-control" value="1" required>
				   
			<label for="name">Область<sup><i class="fa fa-asterisk"
													   style="color: #c0392b;"></i></sup></label>
			<select id="field" name="field" class="form-control" required>
					<option label="&nbsp;"></option>
					<script type="text/javascript"> 
						loadJSONOptions('../../json/resume/edu1Field.json');  
					</script>
				</select>

			<h3>Требования к соискателю</h3>

				<div class="col-sm-2">
					<label for="sex"></label> <sup><i
								class="fa fa-asterisk" style="color: #c0392b;"></i></sup>
					<div class="btn-group" role="group" aria-label="sex">
						<button name="sex" type="button" class="btn btn-default" value="1"><i
									style="color:#2980b9;" class="fa fa-male"></i> м
						</button>
						<button name="sex" type="button" class="btn btn-default" value="2"><i
									style="color:#9b59b6;" class="fa fa-female"></i> ж
						</button>
					</div>
				</div>


				<label for="education">Образование</label> <sup><i class="fa fa-asterisk"
																   style="color: #c0392b;"></i></sup>
				<input id="education" name="education" type="text" class="form-control"
					   placeholder="высшее, н/высшее, ср.-специальное, среднее, не важно"
					   required>

				<label for="workExp">Опыт</label>
				<select id="workExp" name="workExp" class="form-control" required>
					<option label="&nbsp;"></option>
					<script type="text/javascript"> 
						loadJSONOptions('../../json/resume/work.json');  
					</script>
				</select>

				<label for="visa">Прописка</label> <sup><i class="fa fa-asterisk"
														   style="color: #c0392b;"></i></sup>
				<input id="visa" name="visa" type="text" class="form-control"
					   placeholder="городская, областная, временная регистрация, другой город, не важно"
					   required>


				<label for="pcLevel">Навык владения ПК</label>
				<select name="pcLevel" id="pcLevel" class="form-control">
					<option label="&nbsp;"></option>
					<script type="text/javascript"> 
						loadJSONOptions('../../json/resume/pcLevel.json');  
					</script>
				</select>

				<label for="eduSpec">Сфера образования</label> <sup><i class="fa fa-asterisk"
																	   style="color: #c0392b;"></i></sup>
				<input id="eduSpec" name="eduSpec" type="text" class="form-control"
					   placeholder="" required>

				<label for="notes">Примечания</label> <sup><i class="fa fa-asterisk"
															  style="color: #c0392b;"></i>
					<textarea id="notes" name="notes" class="form-control" rows="3" required></textarea>

			</br>

			<button type="submit" id="submitResume" name="submitResume" type="button"
					class="btn btn-lg btn-block btn-success"><i class="fa fa-paper-plane-o"></i>
				<span>Добавить вакансию</span></button>



    </form>
@endsection
