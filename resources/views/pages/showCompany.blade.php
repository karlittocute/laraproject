@extends ('layouts.layout')

@section('content')

    <h2>"{{ $company -> name}}"</h2>
	<p>
		Адрес: {{ $company -> address}}</br>
		Телефон: {{ $company -> phone}}</br>
		Email: {{ $company -> email}}</br>
		{{ $company -> additionalInfo}}</br>
	</p>
	<div class="vacancies">
		@foreach ($company->vacancy as $vacancy)
			<article>
				<h3><a href="/vacancy/{{ $vacancy->id }}">{{ $vacancy->name}}</a></h3>
				Зарплата от: {{ $vacancy->salary_from}}
			</article>
		</br>
		@endforeach
		
	</div>
@endsection