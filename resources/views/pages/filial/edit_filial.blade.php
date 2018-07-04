@extends ('layouts.layout')

@section('title')
Редактирование филиала
@endsection

@section('content')

	@if (Auth::user()->operators->type=='GlobalOperator'|Auth::user()->operators->type=='GlobalAdmin')
		<form id="filial" name="filial" method="POST" action="/filial/{{$filial->id}}">
			{{ csrf_field() }}<!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
			{{ method_field('PUT') }}
			<h1>Форма редактирования  филиала</h1>
			<div class="boxed-group">

				<label for="name">Название филиала</label>
				<input id="name" name="name" class="form-control" type="text" placeholder="" value="{{ $filial->name }}" autofocus required>
				
				<label for="person">Представитель филиала</label>
				<input id="person" name="person" class="form-control" type="text" value="{{ $filial->person }}" autofocus required >
				
				<label for="phone">Контактный телефон</label>
				<input id="phone" name="phone" type="tel" class="form-control"  value="{{ $filial->phone }}" required>
				
				<label for="email">Почта для связи</label>
				<input id="email" name="email" type="email" class="form-control" value="{{ $filial->email }}" required>
				
				<label for="address">Адрес филиала</label>
				<input id="address" name="address" class="form-control" type="text" value="{{ $filial->address }}" autofocus required>
				
				<label for="info">Примечания</label>
				<input id="info" name="info" type="text" class="form-control" aria-label="" value="{{ $filial->info }}">
			</div>
			</br>
			<div class="boxed-group">
				<button type="submit"  type="button" class="btn btn-lg btn-block btn-success"><i class="fa fa-paper-plane-o"></i> <span>Редактировать филиал</span></button>
			</div>
		
		</form>
	@else
		<div class="page-header">
			<h1>У вас нет доступа. Обратитесь к другому оператору</h1>
		</div>
	@endif
@endsection