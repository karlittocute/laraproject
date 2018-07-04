<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Filial;
use App\User;
use App\ErrorsInResume;
use App\Resume;
use App\Operator;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth.role:operator');
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
		return view('pages.operator.operator', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$filial = Filial::orderBy('updated_at', 'desc')->get();
		return view('pages.operator.create_operator', compact('filial'));
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
			'type' => 'required',
			'email'=> 'required|email',
			'filial_id' => 'required',
			'surname' => 'required',
			'name' => 'required',
			'fathersname' => 'required',
			'phone' => 'required'
			
		]);
		
		$user = User::where('email', $request->email)->first();
		$user->role = 'operator';
		$user->save();
		$user_id = $user->id;
		
		$operator = new Operator;
		$operator->user_id = $user_id;
		$operator->type = $request->type;
		$operator->filial_id = $request->filial_id;
		$operator->surname = $request->surname;
		$operator->name = $request->name;
		$operator->fathersname = $request->fathersname;
		$operator->phone = $request->phone;
		$operator->save();
    
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


