@extends ('layouts.layout')

@section('title')
ЭМБиТ | Панель оператора
@endsection

@section('content')
	<div class="container">
		<h1>Панель оператора</h1> </br>
		<div class="row">
			<div class="col-12 col-lg-4 col-md-7">
				<div class="list-group">
					<strong>
					  <a href="{{ URL::asset('/news/create') }}" class="list-group-item list-group-item-action">Добавить новость</a>
					  @if (Auth::user()->operators->type=='GlobalAdmin')
					  <a href="{{ URL::asset('/filial/create') }}" class="list-group-item list-group-item-action">Добавить филиал</a>
					  @endif
					  @if (Auth::user()->operators->type=='LocalAdmin'|Auth::user()->operators->type=='GlobalAdmin')
					  <a href="{{ URL::asset('/operator/create') }}" class="list-group-item list-group-item-action">Добавить оператора</a>
					  @endif
					</strong>
				</div>
			</div>
		</div>
	</div>
	

@endsection

