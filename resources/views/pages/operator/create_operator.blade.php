@extends ('layouts.layout')

@section('title')
ЭМБиТ | Добавление оператора
@endsection

@section('content')
<div class="page-header">
	<h1>Регистрация нового оператора</h1>
</div>
</br>

<div class="accordion" id="accordionExample">
	<div class="card">
		<div class="card-header" id="headingTwo">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					Как зарегистрировать нового оператора?
				</button>
			</h5>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			<div class="card-body">
				<p>
				Для начала оператор должен зарегистрироваться в системе. При регистрации он указывает email, пароль и роль.
				Роль можно выбрать любую, после введения данных на эту страницу, роль станет оператор. 
				</p>
				<p>
				<em>Важно, чтобы оператор не регистрировал в своей учетной записи резюме, компании или вакансии, 
				иначе система не сможет зарегестировать его как оператора. </em>
				</p>
				<p>
				Если у вас есть соответствующий уровень доступа, выберите нужный филиал. 
				Если Вы администратор только одном филиале, то оператор будет автоматически записан в Ваш филиал.
				</p>
				<p>
				Далее необходимо выбрать тип оператора:
				<ul>
					<li>GlobalAdmin - Доступ к записям всех филиалов, может добавлять операторов и администраторов в любой филиал, может управлять филиалами(добавление, редактирование, удаление)</li>
					<li>LocalAdmin - Доступ к записям своего филиала, может добавлять операторов и администраторов в свой филиал</li>
					<li>GlobalOperator - Доступ ко всем записям</li>
					<li>LocalOperator - Доступ только к локальным записям</li>
				</ul>  
				</p>
				<p>
				В конце нужно ввести фамилию, имя, отчество, контактный телефон оператора и нажать кнопку "Добавить оператора"
				</p>
			</div>
		</div>
	</div>
</div>

</br>

 <form id="operator" name="operator" method="POST" action="/operator">
    <div class="container-fluid">
	    {{ csrf_field()}} <!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
		<label for="email">Электронная почта<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
		<input id="email" name="email" type="email" class="form-control" placeholder="kostantin@konstantinopolskiy.ru" required>

		<label for="filial_id">Филиал</label>
		<select id="filial_id" name="filial_id" class="form-control">
			@foreach ($filial as $filial)
				<option selected value="{{ $filial->id }}">{{ $filial->name }}</option>
			@endforeach	
		</select>
		
	    <label for="type">Тип оператора<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
	    <select id="type" name="type" class="form-control" required>
			<option label="&nbsp;"></option>
			<option value="GlobalAdmin">Global Admin</option>
			<option value="LocalAdmin">Local Admin</option>
			<option value="GlobalOperator">Global Operator</option>
			<option value="LocalOperator">Local Operator</option>
	    </select>

		<label for="surname">Фамилия</label>
		<input id="surname" name="surname" class="form-control" type="text" placeholder="Константинопольский" autofocus required>

		<label for="name">Имя</label>
		<input id="name" name="name" class="form-control" type="text" placeholder="Константин" autofocus required>

		<label for="fathersname">Отчество</label>
		<input id="fathersname" name="fathersname" class="form-control" type="text" placeholder="Константинович" autofocus required>

		<label for="phone">Контактный телефон</label>
		<input id="phone" name="phone" type="tel" class="form-control" placeholder="+7 (812) 212 85 06" required>
		
		</br>
		
		<button type="submit" id="submitResume" name="submitResume" type="button" class="btn btn-lg btn-block btn-success"><span>Добавить оператора</span></button>
          @include('layouts.errors')
     </div>
</form>

@endsection