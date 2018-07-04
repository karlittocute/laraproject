@extends ('layouts.layout')

@section('content')
<div class="page-header">
	<h1>Регистрация нового пользователя</h1>
</div>
 <form id="user" name="user" method="POST" action="/user">
      <div class="container-fluid">
	    {{ csrf_field()}} <!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
		<div class="form-group">
			<label for="email">Электронная почта<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
			<input id="email" name="email" type="email" class="form-control" placeholder="kostantin@konstantinopolskiy.ru" required>
		</div>
		<div class="form-group">
			<label for="password">Пароль<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
			<input id="password" name="password" type="password" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="password_confirmation">Повторите Пароль<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
			<input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
		</div>
		<div class="form-group">
			  <label for="role">Роль<sup><i class="fa fa-asterisk" style="color: #c0392b;"></i></sup></label>
			  <select id="role" name="role" class="form-control" required>
				<option label="&nbsp;"></option>
				<option value="company">Компания</option>
				<option value="applicant">Соискатель</option>
			  </select>
        </div> 
		<div>
		<small>Нажимая кнопку "Зарегестрироваться", Вы соглашаетесь на <a href="{{ URL::asset('/personal_data') }}">обработку персональных данных</a></small></br></br>
		</div>
		<button type="submit" id="submitResume" name="submitResume" type="button" class="btn btn-lg btn-block btn-success"><i class="fa fa-paper-plane-o"></i> <span>Зарегистрироваться</span></button>
          @include('layouts.errors')
      </div>
    </form>


@endsection