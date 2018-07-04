<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ URL::asset('/') }}">
		<img src="/img/embit.png" width="70" height="57" class="d-inline-block align-top" alt="">
		
	</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::asset('/vacancy') }}" color="black"><strong>Поиск работы</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::asset('/resume') }}"><strong>Поиск персонала</strong></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="{{ URL::asset('/news') }}"><strong>Новости</strong></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>Помощь</strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ URL::asset('/help/how_make_resume') }}">Как написать резюме</a>
          <a class="dropdown-item" href="{{ URL::asset('/help/how_make_choice') }}">Помощь в выборе профессии</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>Информация </strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ URL::asset('/info/about_burse') }}">О бирже</a>
		  <a class="dropdown-item" href="{{ URL::asset('/info/about_system') }}">О системе</a>
		  <a class="dropdown-item" href="{{ URL::asset('/info/partners') }}">Партнеры</a>
        </div>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="{{ URL::asset('/contacts') }}"><strong>Контакты</strong></a>
      </li>
    </ul>
	<span class="navbar-text">
     @if (Auth::check())
				<a href="{{ URL::asset('/user') }}">{{Auth::user()->email}}</a>
				|
				<a href="{{ URL::asset('/logout') }}">Выход</a>
			@else 
				<a href="{{ URL::asset('/login') }}">Вход</a>
				|
				<a href="{{ URL::asset('user/create') }}">Регистрация</a>
			@endif
    </span>
	
  </div>
  
</nav>



