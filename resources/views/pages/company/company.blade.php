@extends ('layouts.layout')

@section('title')
ЭМБиТ | Компании
@endsection

@section('content')
    @foreach($companies as $company)
	<article>
        <h2><a href="/company/{{ $company->id }}">"{{ $company -> name}}"</a></h2>
		<p>
		{{ $company -> additionalInfo }}
		</p>
	</article>
    @endforeach
	</br>
	{{ $companies->links()}}
@endsection