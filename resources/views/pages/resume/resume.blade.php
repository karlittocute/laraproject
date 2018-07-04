@extends ('layouts.layout')

@section('title')
Резюме
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
  <style>
   .shadow {
    box-shadow: 0 0 10px rgba(0,0,0,0.2); /* Параметры тени */
    padding: 15px;
	border-radius: 8px;
   }
  </style>
@endsection

@section('content')

	<div class="shadow">
	<form method="GET" action="/resume">
	  <div class="row">
		<div class="col-md-5 col-sm-12">
		  <label for="name">Название вакансии</label>
		  <input type="text" id="name" name="name" class="form-control" placeholder="Управляющий">
		</div>
		<div class="col-md-5 col-sm-12">
		  <label for="field">Область</label>
		  <select id="field" name="field" class="form-control">
				<option label="&nbsp;"></option>
				<script type="text/javascript"> 
					loadJSONOptions('../../json/resume/edu1Field.json');  
				</script>
			</select>
		
		</div>
		<div class="col-auto my-1">
		</br>
		<button type="submit" class="btn btn-success">Поиск</button>
		</div>
	  </div>
	</form>
	</div>
	</br>
	<hr align="center" color="#ff0000" />
	</br>
	@foreach ($resumes as $resume)
			<a href="/resume/{{ $resume->id }}">
				<h3>{{ $resume->vacancy }}</h2>
			</a>
			<p><strong>от {{ $resume->salary }} руб</br></strong>
			<script type="text/javascript"> document.write(loadValue('../../json/resume/edu1Field.json', {{ $resume->vacancyField }})); </script></br>
			Опыт работы: <script type="text/javascript"> document.write(loadValue('../../json/resume/work.json', {{ $resume->work }})); </script></br>
			
			<small class="text-muted"> {{ $resume->updated_at}}</small>
			</p>	
			<hr align="center" color="#ff0000" />
	@endforeach
	</br>
	{{ $resumes->links()}}
@endsection