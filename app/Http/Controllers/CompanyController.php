<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use app\Http\Middleware\MiddlewareCompany;
use DB;
use App\ErrorsInCompany;
use App\Filial;

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
		$this->middleware('auth.record:companies')->only('create');
	}
	
    public function index()
    {
        /* 
		$companies = DB::table('companies')->get();
        return view('pages.company.company', compact('companies'));
		*/
		return view('pages.company.company', ['companies'=> Company::paginate(7)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$filial = Filial::orderBy('updated_at', 'desc')->get();
        return view('pages.company.create_company', compact('filial'));
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
			new Company($request->all([]))
		);
		
        return redirect('company');
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
        return view ('pages.company.show_company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filial = Filial::orderBy('updated_at', 'desc')->get();
		$company = Company::find($id);
        return view('pages.company.edit_company', compact('company','filial'));
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
        $data = $request->except(['_token','_method']);
		$company =  Company::find($id);
		$company->fill($data);
		$company->active = 0;
		$company->save();
		
		return redirect()->action('CompanyController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$company = Company::find($id);
		$company->delete();
		return redirect('/company');
        /**
		$company = Company::find($id);
		$company->active = 0;
		$company->public = 1;
		$company->save();
		return redirect()->action('CompanyController@index');
		**/
    }
}
