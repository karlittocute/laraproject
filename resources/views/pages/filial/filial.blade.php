@extends ('layouts.layout')

@section('title')
Филиалы
@endsection


@section('content')

	@foreach ($filial as $filial)
			<a href="/filial/{{ $filial->id }}">
				<h3>{{ $filial->name }}</h2>
			</a>
			<p>
				
				Телефон: {{ $filial->phone }}</br>
				Email: {{ $filial->email }}</br>
				Адрес: {{ $filial->address }}</br>
				<small class="text-muted"> {{ $filial->updated_at->Format('d.m.Y')}}</small>
			</p>	
	@endforeach
	
@endsection