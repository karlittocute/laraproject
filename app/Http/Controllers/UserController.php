<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\ErrorsInResume;
use App\Resume;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except(['index']);
		$this->middleware('auth')->except(['create', 'store']);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		$id = Auth::user()->id;
		$user = User::find($id);
		//dd($user);
		return view('pages.user.show_user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('pages.user.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate(request(),[
			'role' => 'required',
			'email'=> 'required|email',
			'password'=> 'required|confirmed'
		]);
		
		$user = new User;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = $request->role;
		$user->save();
    
		Auth::login($user);
		
		if (request('role') == 'applicant' ) {
			return redirect('/resume/create');
		}
		elseif (request('role') == 'company' ){
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


