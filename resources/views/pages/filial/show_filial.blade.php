@extends ('layouts.layout')

@section('title')
{{ $filial->name }}
@endsection


@section('content')
	<div class="container">
		<p>			
			<h2>{{ $filial->name }}</h2>
			<small class="text-muted"> {{ $filial->updated_at->Format('d.m.Y')}}</small>  </br>
			Руководитель: {{ $filial->person }}</br>
			Телефон: {{ $filial->phone }}</br>
			Email: {{ $filial->email }}</br>
			Адрес: {{ $filial->address }}</br></br>
			Примечания: {{ $filial->info }}</br>
		</p>
	</div>
	@if (Auth::user()->operators->type=='GlobalOperator'|Auth::user()->operators->type=='GlobalAdmin')	
		<blockquote class="blockquote text-center">
			<div class="col-12 offset-lg-3 col-lg-6">
			<form action="{{$filial->id}}/edit">
				<input class="btn btn-lg btn-block btn-success" type="submit" value="Редактировать филиал">
			</form> 
			</br>
			<form method="POST" action="{{$filial->id}}">
				{{ csrf_field()}}
				{{ method_field('DELETE') }} 
				<input class="btn btn-lg btn-block btn-success" type="submit" value="Удалить филиал">
			</form> 
			</div>
		</blockquote>
	@endif
	
@endsection

