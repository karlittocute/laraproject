@extends ('layouts.layout')

@section('content')
	Вакансия
    <h2>{{ $vacancy -> name}}</h2>
	
	<h3>Компания: <a href="/company/{{ $vacancy->company->id }}">{{$vacancy->company->name}}</a></h3>
	<h3>Зарплата от : {{$vacancy->salary_from}}</h3>
@endsection