@extends ('layouts.layout')

@section('title')
ЭМБиТ | {{ $news->title }}
@endsection

@section('content')
	<h1>{{ $news->title }}</h1>
	</br>
	<p>
		{{ $news->content }}</br>
		<small class="text-muted"> {{ $news->created_at->Format('d.m.Y')}}</small>
	</p>	
	@if (Auth::check() and Auth::user()->role=='operator')
		@if (Auth::user()->operators->type=='GlobalOperator'|Auth::user()->operators->type=='GlobalAdmin')
			<blockquote class="blockquote text-center">
				<div class="col-12 offset-lg-3 col-lg-6  ">
				<form action="{{$news->id}}/edit">
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Редактировать новость">
				</form> 
				</br>
				<form method="POST" action="{{$news->id}}">
					{{ csrf_field()}}
					{{ method_field('DELETE') }} 
					<input class="btn btn-lg btn-block btn-success" type="submit" value="Удалить новость">
				</form> 
				</div>
			</blockquote>
		@endif
	@endif
@endsection

