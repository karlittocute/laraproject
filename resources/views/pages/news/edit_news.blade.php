@extends ('layouts.layout')

@section('title')
ЭМБиТ | Редактировать новость
@endsection

@section('content')
	
	@if (Auth::user()->operators->type=='GlobalOperator'|Auth::user()->operators->type=='GlobalAdmin')
		<h3>Форма редактирования новости</h3>
		<form id="news" name="news" method="POST" action="/news/{{$news->id}}">
			{{ csrf_field() }}<!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
			{{ method_field('PUT') }}
			<label for="title">Заголовок</label>
			<input id="title" name="title" class="form-control" type="text" value="{{ $news->title }}" autofocus required>
			
			<label for="description">Описание</label>
			<textarea id="description" name="description" class="form-control" rows="3">{{ $news->description }}</textarea> 

			<label for="content">Содержание</label>
			<textarea id="content" name="content" class="form-control" rows="3">{{ $news->content }}</textarea> 
			</br>

			<button type="submit" id="submitNews" name="submitNews" type="button" class="btn btn-lg btn-block btn-success"><span>Редактировать новость</span></button>
			  @include('layouts.errors')
		  </div>
		</form>
	@else
		<div class="page-header">
			<h1>У вас нет доступа. Обратитесь к другому оператору</h1>
		</div>
	@endif
@endsection