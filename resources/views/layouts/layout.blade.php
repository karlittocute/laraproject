<!doctype html>
<html lang="ru">
<head>
    @include('layouts.header')
</head>
<body>
    @include('layouts.top')
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					@yield('content')
				</div>
			</div>
		</div>

	
	@include('layouts.footer')
	
	@include('layouts.scripts')
</body>
	
</html>