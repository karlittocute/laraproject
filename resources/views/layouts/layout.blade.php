<!doctype html>
<html lang="ru">
<head>
    @include('layouts.header')
</head>
<body>
    @include('layouts.top')

    @yield('content')
	
	@include('layouts.footer')
	
	@include('layouts.scripts')
</body>
	
</html>