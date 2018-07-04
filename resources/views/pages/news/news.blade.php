@extends ('layouts.layout')

@section('title')
ЭМБиТ | Новости
@endsection

@section('content')
	@foreach ($news as $news)
		<a href="/news/{{ $news->id }}">
			<h3>{{ $news->title }}</h2>
		</a>
		{{ $news->description }}</br>
		
		<small class="text-muted"> {{ $news->created_at->Format('d.m.Y')}}</small>
		</p>	
	@endforeach
@endsection