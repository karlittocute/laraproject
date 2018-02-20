@extends ('layouts.layout')

@section('content')
    @foreach($companies as $company)
	<article>
        <h2><a href="/company/{{ $company->id }}">"{{ $company -> name}}"</a></h2>
		<p>
		{{ $company -> additionalInfo }}
		</p>
	</article>
    @endforeach
@endsection