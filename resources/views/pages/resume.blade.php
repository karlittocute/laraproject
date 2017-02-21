@extends ('layouts.layout')

@section('content')
	@foreach ($resume as $resume)
		<div class="container">
			<a href="/resume/{{ $resume->id }}">
				<h3>���: {{ $resume->name }}</h2>
			</a>
			<p> {{ $resume->updated_at}} </p>
			<li>�������: {{ $resume->phone }}</li>
			<li>Email: {{ $resume->email }}</li>
		</div>
	@endforeach
@endsection