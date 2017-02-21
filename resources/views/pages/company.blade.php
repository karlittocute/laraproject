@extends ('layouts.layout')

@section('content')
    @foreach($companies as $company)
        {{ $company -> name}}
    @endforeach
@endsection