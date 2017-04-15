<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use app\Http\Middleware\MiddlewareCompany;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function __construct()
	{
		$this->middleware('auth.role:company')->except(['index','show']);
	}
	
    public function index()
    {
        $companies = DB::table('companies')->get();
        return view('pages.company', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		auth()->user()->new_company(
			new Company($request[('name','phone')])
		);
        //$company = new Company;
		//$user['user_id'] = auth()->id();
		//$new = $user + $request;
		dd($request->all());
        //Company::create($request->all());

        //return redirect('company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
		//DB::table('companies')->find($id);
        return view ('pages.showCompany', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
