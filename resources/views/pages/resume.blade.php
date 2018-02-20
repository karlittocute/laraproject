@extends ('layouts.layout')

@section('content')
	@foreach ($resume as $resume)
			<a href="/resume/{{ $resume->id }}">
				<h3>Имя: {{ $resume->name }}</h2>
			</a>
			<p> {{ $resume->updated_at}} </p>
			<li>Телефон: {{ $resume->phone }}</li>
			<li>Email: {{ $resume->email }}</li>
	@endforeach
@endsection