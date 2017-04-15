<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest',['except' => 'destroy']);
	}
	
	
    public function create()
    {
		return view('pages.login');
    }
	public function destroy()
    {
		auth()->logout();
		
		return redirect('/');
    }
	
	public function store(Request $request)
    {
		if (! auth()->attempt(request(['email', 'password']))) {
			return back()->withErrors([
				'message' => 'Неверный логин или пароль.'
				]);
		};
		return view('welcome');
    }
}
