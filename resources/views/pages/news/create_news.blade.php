@extends ('layouts.layout')

@section('title')
ЭМБиТ | Добавить новость
@endsection

@section('content')

	@if (Auth::user()->operators->type=='GlobalOperator'|Auth::user()->operators->type=='GlobalAdmin')
		<div class="page-header">
			<h3>Форма добавления новости</h3>
		</div>
		<form id="news" name="news" method="POST" action="/news">
			  <div class="container-fluid">
				{{ csrf_field()}} <!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
				<label for="title">Заголовок</label>
				<input id="title" name="title" class="form-control" type="text" autofocus required>
				
				<label for="description">Описание</label>
				<textarea id="description" name="description" class="form-control" rows="3" placeholder="Краткое описание новости"></textarea> 

				<label for="content">Содержание</label>
				<textarea id="content" name="content" class="form-control" rows="3" placeholder=""></textarea> 
				</br>

				<button type="submit" id="submitNews" name="submitNews" type="button" class="btn btn-lg btn-block btn-success"><span>Добавить новость</span></button>
				  @include('layouts.errors')
			  </div>
		</form>
	@else
		<div class="page-header">
			<h1>У вас нет доступа. Обратитесь к другому оператору</h1>
		</div>
	@endif
@endsection