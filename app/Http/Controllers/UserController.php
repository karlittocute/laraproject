<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('pages.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$user = new User;
    
		$user->email = request('email');
		$user->password = request('password');
		$user->role = request('role');
		$user->save();
		
		//Resume::create(request()->all()); Эта строчка будет отправлять все данные из формы в БД
		//dd(request()->all()); //  Эта строчка выводит данные из формы на экран
		if (request('role') == 'applicant' ) {
			return redirect('/resume/create');
		}
		else {
			return redirect('/company/create');
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $resume_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $resume_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

