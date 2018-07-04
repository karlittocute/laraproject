@extends ('layouts.layout')

@section('title')
ЭМБиТ | Добавление информации о компании
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
    <h1>Информация о компании</h1>
	<form method="POST" action="/company">
        {{ csrf_field() }}
        <div class="form-group ">
            <label class="control-label requiredField" for="name"> Название компании</label>
            <input class="form-control" id="name" name="name" type="text"/>
        </div>
		<label for="filial_id">Филиал</label>
			<select id="filial_id" name="filial_id" class="form-control">
				@foreach ($filial as $filial)
					<option selected value="{{ $filial->id }}">{{ $filial->name }}</option>
				@endforeach	
			</select>
			
        <label for="field">Область деятельности</label>
			<select id="field" name="field" class="form-control" required>
				<option label="&nbsp;"></option>
				<script type="text/javascript"> 
					loadJSONOptions('../../json/resume/edu1Field.json');  
				</script>
			</select>
			
        <div class="form-group ">
            <label class="control-label requiredField" for="profile">Чем занимается компания</label>
            <textarea class="form-control" cols="40" id="profile" name="profile" rows="2"></textarea>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="cityId"> Город</label>
			<input id="cityId" name="cityId" class="form-control" type="text" placeholder="Санкт-Петербург" required>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="address">Адрес</label>
            <textarea class="form-control" cols="40" id="address" name="address" rows="2"></textarea>
            
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="persons"> Контакты</label>
            <textarea class="form-control" cols="40" id="persons" name="persons" rows="2"></textarea>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="phone">Телефон</label>
            <input class="form-control" id="phone" name="phone" placeholder="8-900-123-45-67" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="email"> Электронная почта </label>
            <input class="form-control" id="email" name="email" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="contractNumber"> Номер договора</label>
            <input class="form-control" id="contractNumber" name="contractNumber" type="text"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="additionalInfo">  Дополнительная информация  </label>
            <textarea class="form-control" cols="40" id="additionalInfo" name="additionalInfo" rows="3"></textarea>
        </div>

       <button type="submit" type="button" class="btn btn-lg btn-block btn-success">Добавить  информацию о компании</button>
    </form>
@endsection