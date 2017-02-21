@extends ('layouts.layout')

@section('content')
	<div class="container">
			<h3>Имя: {{ $resume->name }}</h2>
			<p> {{ $resume->updated_at}} </p>
			<li>Телефон: {{ $resume->phone }}</li>
			<li>Email: {{ $resume->email }}</li>
		</div>

@endsection

