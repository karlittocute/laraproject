@extends ('layouts.layout')

@section('content')
    @foreach($vacancies as $vacancy)
        {{ $vacancy -> name}}
    @endforeach
@endsection