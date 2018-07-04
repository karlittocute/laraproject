@extends ('layouts.layout')
@section('title')
Добавление филиала
@endsection

@section('content')
		
	@if (Auth::user()->operators->type=='GlobalOperator'|Auth::user()->operators->type=='GlobalAdmin')	
		<form id="filial" name="filial" method="POST" action="/filial">
			{{ csrf_field()}} <!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
			<h1>Форма добавления филиала</h1>

			<div class="boxed-group">

				<label for="name">Название филиала</label>
				<input id="name" name="name" class="form-control" type="text" placeholder="" autofocus required>
				
				<label for="person">Представитель филиала</label>
				<input id="person" name="person" class="form-control" type="text" placeholder="Константинопольский Константин Константинович" autofocus required>
				
				<label for="phone">Контактный телефон</label>
				<input id="phone" name="phone" type="tel" class="form-control" placeholder="+7 (812) 212 85 06" required>
				
				<label for="email">Почта для связи</label>
				<input id="email" name="email" type="email" class="form-control" placeholder="kostantin@konstantinopolskiy.ru" required>
				
				<label for="address">Адрес филиала</label>
				<input id="address" name="address" class="form-control" type="text" placeholder="Регион __ Город ___, улица ___, дом ___" autofocus required>
				
				<label for="info">Примечания</label>
				<input id="info" name="info" type="text" class="form-control" aria-label="" placeholder="">
			</div>
			</br>
			<div class="boxed-group">
				<button type="submit" id="submitFilial" name="submitFilial" type="button" class="btn btn-lg btn-block btn-success"><i class="fa fa-paper-plane-o"></i> <span>Добавить филиал</span></button>
			</div>
		
		</form>
	@else
		<div class="page-header">
			<h1>У вас нет доступа. Обратитесь к другому оператору</h1>
		</div>
	@endif
@endsection



@section('js')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script>
		$(function() {
		  console.log('Jquery is ok');
		  $('#scheduletext').prop('disabled', true);
		  $('#submitResume').on('click', function(){
			console.clear();
			console.log('Hello!');
			let visa = $('#visa').val();
			if (visa === "") 
			  console.log('visa= ' + visa);
			$('#resume').submit();
		  });
		  $('#schedulespecial').change(function() {
			if ($(this).is(":checked")) {
			  $('#scheduletext').prop('disabled', false);          
			}
			else {
			  $('#scheduletext').prop('disabled', true);           
			}
		  })
		}); // The end of jquery code.
		</script>
	
@endsection